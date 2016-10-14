<?php

namespace SA\AtendimentoBundle\Controller;

use SA\AtendimentoBundle\Entity\TbAtendimento;
use SA\AtendimentoBundle\Form\TbAtendimentoType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SA\AtendimentoBundle\Entity\TbApontamento;
use SA\AtendimentoBundle\Form\TbApontamentoType;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityRepository;

/**
 * TbApontamento controller.
 *
 * @Route("/apontamento")
 */
class TbApontamentoController extends Controller
{
    /**
     * Lists all TbApontamento entities.
     *
     * @Route("/{atendimento}", name="apontamento_index")
     * @Method("GET")
     */
    public function indexAction(TbAtendimento $atendimento)
    {

        $em = $this->getDoctrine()
                   ->getRepository('SAAtendimentoBundle:TbApontamento');


        $tbApontamentos = $em->createQueryBuilder('Apontamento')
            ->where('Apontamento.atCodigo = :atendimento')
            ->orderBy('Apontamento.apCodigo','DESC')
            ->setParameter('atendimento',$atendimento)
            ->getQuery()
            ->getResult();


        return $this->render('@SAAtendimento/tbapontamento/index.html.twig', array(
            'tbApontamentos' => $tbApontamentos,
        ));
    }

    /**
     * Creates a new TbApontamento entity.
     *
     * @Route("/new/{atendimento}", name="apontamento_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(TbAtendimento $atendimento, Request $request)
    {

        if(!$atendimento){
            throw $this->createNotFoundException('Atendimento não encontrado');
        }

        $tbApontamento = new TbApontamento();
        $tbApontamento->setApDataRetorno(new \DateTime('now'));

        $tipoAtendimento = $atendimento->getTaCodigo();

        $form = $this->createForm(TbApontamentoType::class, $tbApontamento);

        $form->add('tapCodigo',EntityType::class,array('mapped'=>false,
            'label'=>'Tipo de Apontamento',
            'attr'=>array('class'=>'input-sm'),
            'class'=>'SA\AtendimentoBundle\Entity\TbTipoApontamento',
            'query_builder' => function(EntityRepository $er)use($tipoAtendimento){
                return $er->createQueryBuilder('TipoApontamento')
                    ->join('TipoApontamento.atCodigo','tipo')
                    ->where('TipoApontamento.atCodigo = :tipoAtendimento')
                    ->setParameter('tipoAtendimento',$tipoAtendimento)
                    ->orderBy('tipo.atDescricao');
            },
            'placeholder' => 'Selecione'));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $date = new \DateTime('now');

            $dadosApontamento = $request->request->get('apontamento');

            if($dadosApontamento['satCodigo'] == 3){

                $produto = $this->getDoctrine()
                    ->getRepository('SAAtendimentoBundle:Produto')
                    ->getProdutoPendente($atendimento->getId());

                if($produto){

                    $message = array('type'=>'warning',
                                     'description'=>'Existem produtos pendentes e este atendimento não pode ser finalizado!');
                    $this->addFlash('notice',$message);

                    return $this->render('@SAAtendimento/tbapontamento/new.html.twig', array(
                        'tbApontamento' => $tbApontamento,
                        'form' => $form->createView(),
                        'tbAtendimento' => $atendimento
                    ));

                }

            }

            $tbApontamento->setUsuCodigo($this->getUser()->getUsuCodigo())
                          ->setApDataApontamento($date)
                          ->setAtCodigo($atendimento);

            $tbStatusAtendimento = $this->getDoctrine()
                ->getRepository('SAAtendimentoBundle:TbStatusAtendimento')
                ->find($dadosApontamento['satCodigo']);

            $tipoDirecionamento = $this->getDoctrine()
                ->getRepository('SAAtendimentoBundle:TbTipoDirecionamento')
                ->find($dadosApontamento['tdCodigo']);

            $atendimento->setSatCodigo($tbStatusAtendimento)
                        ->setAtDataRetorno(new \DateTime($dadosApontamento['apDataRetorno']))
                        ->setTdCodigo($tipoDirecionamento);

            $em->persist($tbApontamento);
            $em->persist($atendimento);
            $em->flush();

            $this->addFlash('notice','Apontamento criado com sucesso!');

            return $this->redirectToRoute('atendimento_show', array('id' => $tbApontamento->getAtCodigo()->getAtCodigo()));

        }

        if($atendimento->getSatCodigo()->getSatCodigo() != 3) {

            return $this->render('@SAAtendimento/tbapontamento/new.html.twig', array(
                'tbApontamento' => $tbApontamento,
                'form' => $form->createView(),
                'tbAtendimento' => $atendimento
            ));

        }else{

            return $this->render('@SAAtendimento/tbapontamento/show.html.twig',array(
                'tbApontamento' => $tbApontamento,
                'tbAtendimento' => $atendimento
            ));

        }


    }

    /**
     * Finds and displays a TbApontamento entity.
     *
     * @Route("/{id}", name="apontamento_show")
     * @Method("GET")
     */
    public function showAction(TbApontamento $tbApontamento)
    {
        $deleteForm = $this->createDeleteForm($tbApontamento);

        return $this->render('SAAtendimentoBundle:tbapontamento:show.html.twig', array(
            'tbApontamento' => $tbApontamento,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TbApontamento entity.
     *
     * @Route("/{id}/edit", name="apontamento_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TbApontamento $tbApontamento)
    {
        $deleteForm = $this->createDeleteForm($tbApontamento);
        $editForm = $this->createForm('SA\AtendimentoBundle\Form\TbApontamentoType', $tbApontamento);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tbApontamento);
            $em->flush();

            return $this->redirectToRoute('apontamento_edit', array('id' => $tbApontamento->getId()));
        }

        return $this->render('tbapontamento/edit.html.twig', array(
            'tbApontamento' => $tbApontamento,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TbApontamento entity.
     *
     * @Route("/{id}", name="apontamento_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TbApontamento $tbApontamento)
    {
        $form = $this->createDeleteForm($tbApontamento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tbApontamento);
            $em->flush();
        }

        return $this->redirectToRoute('apontamento_index');
    }

    /**
     * Creates a form to delete a TbApontamento entity.
     *
     * @param TbApontamento $tbApontamento The TbApontamento entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TbApontamento $tbApontamento)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('apontamento_delete', array('id' => $tbApontamento->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
