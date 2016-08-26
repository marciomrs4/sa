<?php

namespace SA\AtendimentoBundle\Controller;

use SA\AtendimentoBundle\Entity\TbStatusAtendimento;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SA\AtendimentoBundle\Entity\TbAtendimento;
use SA\AtendimentoBundle\Form\TbAtendimentoType;
use SA\AtendimentoBundle\Form\TbAtendimentoSearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * TbAtendimento controller.
 *
 * @Route("/atendimento")
 */
class TbAtendimentoController extends Controller
{
    /**
     * Lists all TbAtendimento entities.
     *
     * @Route("/", name="atendimento_index")
     * @Method("GET|POST")
     */
    public function indexAction(Request $request)
    {
        ini_set("memory_limit","256M");

        $form = $this->createForm(TbAtendimentoSearchType::class,new TbAtendimento());

        $data = new \DateTime('now');

        $form->get('atDataRetornoB')
            ->setData($data);

        $form->get('atDataRetornoA')
            ->setData($data->modify('-240 day'));


        $tbAtendimentos = $this->getDoctrine()
            ->getManager()
            ->getRepository('SAAtendimentoBundle:TbAtendimento')
            ->getAllList($request->request->get('search_atendimento'));

        if($request->isMethod('POST')){
            $form->handleRequest($request);
        }

        return $this->render('@SAAtendimento/tbatendimento/index.html.twig', array(
            'tbAtendimentos' => $tbAtendimentos,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new TbAtendimento entity.
     *
     * @Route("/new", name="atendimento_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {


        $tbAtendimento = new TbAtendimento();
        $date = new \DateTime('now');
        $tbAtendimento->setAtDataCadastro($date);
        $form = $this->createForm(TbAtendimentoType::class, $tbAtendimento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $tbAtendimento->setUsuCodigo($this->getUser()->getUsuCodigo());

            $tbStatusAtendimento = $this->getDoctrine()
                ->getRepository('SAAtendimentoBundle:TbStatusAtendimento')
                ->find(1);

            $tbAtendimento->setSatCodigo($tbStatusAtendimento);

            $em->persist($tbAtendimento);
            $em->flush();

            $this->addFlash('notice','Atendimento criado com sucesso!.');

            return $this->redirectToRoute('atendimento_show', array('id' => $tbAtendimento->getId()));
        }


        return $this->render('@SAAtendimento/tbatendimento/new.html.twig',array(
            'form' => $form->createView(),
            'tbAtendimento' => $tbAtendimento
        ));
    }

    /**
     * Finds and displays a TbAtendimento entity.
     *
     * @Route("/{id}", name="atendimento_show")
     * @Method("GET")
     */
    public function showAction(TbAtendimento $tbAtendimento)
    {
        $deleteForm = $this->createDeleteForm($tbAtendimento);

        return $this->render('@SAAtendimento/tbatendimento/show.html.twig', array(
            'tbAtendimento' => $tbAtendimento,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TbAtendimento entity.
     *
     * @Route("/{id}/edit", name="atendimento_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TbAtendimento $tbAtendimento)
    {
        $deleteForm = $this->createDeleteForm($tbAtendimento);
        $editForm = $this->createForm('SA\AtendimentoBundle\Form\TbAtendimentoType', $tbAtendimento);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tbAtendimento);
            $em->flush();

            $this->addFlash('notice','Atendimento alterado com sucesso!');

            return $this->redirectToRoute('atendimento_show', array('id' => $tbAtendimento->getId()));
        }

        if($tbAtendimento->getSatCodigo()->getSatCodigo() == 1) {

            return $this->render('@SAAtendimento/tbatendimento/edit.html.twig', array(
                'tbAtendimento' => $tbAtendimento,
                'form' => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            ));
        }

        $this->addFlash('notice','Este Atendimento não pode ser editado.');

        return $this->redirectToRoute('atendimento_show',array(
            'id' => $tbAtendimento->getAtCodigo()
        ));

    }

    /**
     * Deletes a TbAtendimento entity.
     *
     * @Route("/{id}", name="atendimento_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TbAtendimento $tbAtendimento)
    {
        $form = $this->createDeleteForm($tbAtendimento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tbAtendimento);
            $em->flush();
        }

        return $this->redirectToRoute('atendimento_index');
    }

    /**
     * Creates a form to delete a TbAtendimento entity.
     *
     * @param TbAtendimento $tbAtendimento The TbAtendimento entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TbAtendimento $tbAtendimento)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('atendimento_delete', array('id' => $tbAtendimento->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }


}
