<?php

namespace SA\AtendimentoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SA\AtendimentoBundle\Entity\StatusProduto;
use SA\AtendimentoBundle\Form\StatusProdutoType;

/**
 * StatusProduto controller.
 *
 * @Route("/cadastro/statusproduto")
 */
class StatusProdutoController extends Controller
{
    /**
     * Lists all StatusProduto entities.
     *
     * @Route("/", name="cadastro_statusproduto_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $statusProdutos = $em->getRepository('SAAtendimentoBundle:StatusProduto')->findAll();

        return $this->render('statusproduto/index.html.twig', array(
            'statusProdutos' => $statusProdutos,
        ));
    }

    /**
     * Creates a new StatusProduto entity.
     *
     * @Route("/new", name="cadastro_statusproduto_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $statusProduto = new StatusProduto();
        $form = $this->createForm('SA\AtendimentoBundle\Form\StatusProdutoType', $statusProduto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($statusProduto);
            $em->flush();

            return $this->redirectToRoute('cadastro_statusproduto_show', array('id' => $statusProduto->getId()));
        }

        return $this->render('statusproduto/new.html.twig', array(
            'statusProduto' => $statusProduto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a StatusProduto entity.
     *
     * @Route("/{id}", name="cadastro_statusproduto_show")
     * @Method("GET")
     */
    public function showAction(StatusProduto $statusProduto)
    {
        $deleteForm = $this->createDeleteForm($statusProduto);

        return $this->render('statusproduto/show.html.twig', array(
            'statusProduto' => $statusProduto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing StatusProduto entity.
     *
     * @Route("/{id}/edit", name="cadastro_statusproduto_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, StatusProduto $statusProduto)
    {
        $deleteForm = $this->createDeleteForm($statusProduto);
        $editForm = $this->createForm('SA\AtendimentoBundle\Form\StatusProdutoType', $statusProduto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($statusProduto);
            $em->flush();

            return $this->redirectToRoute('cadastro_statusproduto_edit', array('id' => $statusProduto->getId()));
        }

        return $this->render('statusproduto/edit.html.twig', array(
            'statusProduto' => $statusProduto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a StatusProduto entity.
     *
     * @Route("/{id}", name="cadastro_statusproduto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, StatusProduto $statusProduto)
    {
        $form = $this->createDeleteForm($statusProduto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($statusProduto);
            $em->flush();
        }

        return $this->redirectToRoute('cadastro_statusproduto_index');
    }

    /**
     * Creates a form to delete a StatusProduto entity.
     *
     * @param StatusProduto $statusProduto The StatusProduto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(StatusProduto $statusProduto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cadastro_statusproduto_delete', array('id' => $statusProduto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
