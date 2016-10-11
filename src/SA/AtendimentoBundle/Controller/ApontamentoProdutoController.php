<?php

namespace SA\AtendimentoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SA\AtendimentoBundle\Entity\ApontamentoProduto;
use SA\AtendimentoBundle\Form\ApontamentoProdutoType;

/**
 * ApontamentoProduto controller.
 *
 * @Route("/cadastro/apontamentoproduto")
 */
class ApontamentoProdutoController extends Controller
{
    /**
     * Lists all ApontamentoProduto entities.
     *
     * @Route("/", name="cadastro_apontamentoproduto_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $apontamentoProdutos = $em->getRepository('SAAtendimentoBundle:ApontamentoProduto')->findAll();

        return $this->render('apontamentoproduto/index.html.twig', array(
            'apontamentoProdutos' => $apontamentoProdutos,
        ));
    }

    /**
     * Creates a new ApontamentoProduto entity.
     *
     * @Route("/new", name="cadastro_apontamentoproduto_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $apontamentoProduto = new ApontamentoProduto();
        $form = $this->createForm('SA\AtendimentoBundle\Form\ApontamentoProdutoType', $apontamentoProduto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($apontamentoProduto);
            $em->flush();

            return $this->redirectToRoute('cadastro_apontamentoproduto_show', array('id' => $apontamentoProduto->getId()));
        }

        return $this->render('apontamentoproduto/new.html.twig', array(
            'apontamentoProduto' => $apontamentoProduto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ApontamentoProduto entity.
     *
     * @Route("/{id}", name="cadastro_apontamentoproduto_show")
     * @Method("GET")
     */
    public function showAction(ApontamentoProduto $apontamentoProduto)
    {
        $deleteForm = $this->createDeleteForm($apontamentoProduto);

        return $this->render('apontamentoproduto/show.html.twig', array(
            'apontamentoProduto' => $apontamentoProduto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ApontamentoProduto entity.
     *
     * @Route("/{id}/edit", name="cadastro_apontamentoproduto_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ApontamentoProduto $apontamentoProduto)
    {
        $deleteForm = $this->createDeleteForm($apontamentoProduto);
        $editForm = $this->createForm('SA\AtendimentoBundle\Form\ApontamentoProdutoType', $apontamentoProduto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($apontamentoProduto);
            $em->flush();

            return $this->redirectToRoute('cadastro_apontamentoproduto_edit', array('id' => $apontamentoProduto->getId()));
        }

        return $this->render('apontamentoproduto/edit.html.twig', array(
            'apontamentoProduto' => $apontamentoProduto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ApontamentoProduto entity.
     *
     * @Route("/{id}", name="cadastro_apontamentoproduto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ApontamentoProduto $apontamentoProduto)
    {
        $form = $this->createDeleteForm($apontamentoProduto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($apontamentoProduto);
            $em->flush();
        }

        return $this->redirectToRoute('cadastro_apontamentoproduto_index');
    }

    /**
     * Creates a form to delete a ApontamentoProduto entity.
     *
     * @param ApontamentoProduto $apontamentoProduto The ApontamentoProduto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ApontamentoProduto $apontamentoProduto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cadastro_apontamentoproduto_delete', array('id' => $apontamentoProduto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
