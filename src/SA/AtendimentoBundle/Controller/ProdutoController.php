<?php

namespace SA\AtendimentoBundle\Controller;

use SA\AtendimentoBundle\Entity\TbAtendimento;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SA\AtendimentoBundle\Entity\Produto;
use SA\AtendimentoBundle\Form\ProdutoType;

/**
 * Produto controller.
 *
 * @Route("/cadastro/produto")
 */
class ProdutoController extends Controller
{
    /**
     * Lists all Produto entities.
     *
     * @Route("/{atendimento}", name="cadastro_produto_index")
     * @Method("GET")
     */
    public function indexAction(TbAtendimento $atendimento)
    {
        $em = $this->getDoctrine()->getManager();

        $produtos = $em->getRepository('SAAtendimentoBundle:Produto')
            ->findBy(array('atendimento' => $atendimento),array('id' => 'DESC'));

        return $this->render('produto/index.html.twig', array(
            'produtos' => $produtos,
            'atendimento' => $atendimento
        ));
    }

    /**
     * Creates a new Produto entity.
     *
     * @Route("/new/{atendimento}", name="cadastro_produto_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(TbAtendimento $atendimento, Request $request)
    {
        $produto = new Produto();

        $statusProduto = $this->getDoctrine()
            ->getRepository('SAAtendimentoBundle:StatusProduto')
            ->find(1);

        $produto->setAtendimento($atendimento)
                ->setStatus($statusProduto)
                ->setUsuarioId($this->getUser()->getUsuCodigo());

        $form = $this->createForm('SA\AtendimentoBundle\Form\ProdutoType', $produto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produto);
            $em->flush();

            return $this->redirectToRoute('cadastro_produto_index', array('atendimento' => $atendimento->getId()));
        }

        if($atendimento->getSatCodigo()->getSatCodigo() == 3){

            return $this->redirectToRoute('cadastro_produto_index',array('atendimento' => $atendimento->getId()));

        }else {

            $httpCliente = $this->get('http.client')
                                ->setCodigo($atendimento->getAtProcesso())
                                ->setSearch('protocolo');

            return $this->render('produto/new.html.twig', array(
                'produto' => $produto,
                'resultData' => $httpCliente->getData(),
                'form' => $form->createView(),
                'atendimento' => $atendimento
            ));
        }
    }

    /**
     * Finds and displays a Produto entity.
     *
     * @Route("/{id}/show", name="cadastro_produto_show")
     * @Method("GET")
     */
    public function showAction(Produto $produto)
    {

        $httpCliente = $this->get('http.client')
                            ->setCodigo(str_replace('/','-',$produto->getCodigoScodes()))
                            ->setSearch('posicaoestoque');

        return $this->render('produto/show.html.twig', array(
            'produto' => $produto,
            'estoque' => $httpCliente->getData()
        ));
    }

    /**
     * Displays a form to edit an existing Produto entity.
     *
     * @Route("/{id}/edit", name="cadastro_produto_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Produto $produto)
    {
        $deleteForm = $this->createDeleteForm($produto);
        $editForm = $this->createForm('SA\AtendimentoBundle\Form\ProdutoType', $produto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produto);
            $em->flush();

            return $this->redirectToRoute('cadastro_produto_show', array('id' => $produto->getId()));
        }

        return $this->render('produto/edit.html.twig', array(
            'produto' => $produto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Produto entity.
     *
     * @Route("/{id}", name="cadastro_produto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Produto $produto)
    {
        $form = $this->createDeleteForm($produto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($produto);
            $em->flush();
        }

        return $this->redirectToRoute('cadastro_produto_index',array('atendimento' => $produto->getAtendimento()->getId()));
    }

    /**
     * Creates a form to delete a Produto entity.
     *
     * @param Produto $produto The Produto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Produto $produto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cadastro_produto_delete', array('id' => $produto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
