<?php

namespace SA\AtendimentoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SA\AtendimentoBundle\Entity\TbTipoApontamento;
use SA\AtendimentoBundle\Form\TbTipoApontamentoType;

/**
 * TbTipoApontamento controller.
 *
 * @Route("/cadastro/tipoapontamento")
 */
class TbTipoApontamentoController extends Controller
{
    /**
     * Lists all TbTipoApontamento entities.
     *
     * @Route("/", name="tipoapontamento_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tbTipoApontamentos = $em->getRepository('SAAtendimentoBundle:TbTipoApontamento')->findAll();

        return $this->render('tbtipoapontamento/index.html.twig', array(
            'tbTipoApontamentos' => $tbTipoApontamentos,
        ));
    }

    /**
     * Creates a new TbTipoApontamento entity.
     *
     * @Route("/new", name="tipoapontamento_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tbTipoApontamento = new TbTipoApontamento();
        $form = $this->createForm('SA\AtendimentoBundle\Form\TbTipoApontamentoType', $tbTipoApontamento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tbTipoApontamento);
            $em->flush();

            return $this->redirectToRoute('tipoapontamento_show', array('id' => $tbTipoApontamento->getId()));
        }

        return $this->render('tbtipoapontamento/new.html.twig', array(
            'tbTipoApontamento' => $tbTipoApontamento,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TbTipoApontamento entity.
     *
     * @Route("/{id}", name="tipoapontamento_show")
     * @Method("GET")
     */
    public function showAction(TbTipoApontamento $tbTipoApontamento)
    {
        $deleteForm = $this->createDeleteForm($tbTipoApontamento);

        return $this->render('tbtipoapontamento/show.html.twig', array(
            'tbTipoApontamento' => $tbTipoApontamento,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TbTipoApontamento entity.
     *
     * @Route("/{id}/edit", name="tipoapontamento_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TbTipoApontamento $tbTipoApontamento)
    {
        $deleteForm = $this->createDeleteForm($tbTipoApontamento);
        $editForm = $this->createForm('SA\AtendimentoBundle\Form\TbTipoApontamentoType', $tbTipoApontamento);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tbTipoApontamento);
            $em->flush();

            return $this->redirectToRoute('tipoapontamento_show', array('id' => $tbTipoApontamento->getId()));
        }

        return $this->render('tbtipoapontamento/edit.html.twig', array(
            'tbTipoApontamento' => $tbTipoApontamento,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TbTipoApontamento entity.
     *
     * @Route("/{id}", name="tipoapontamento_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TbTipoApontamento $tbTipoApontamento)
    {
        $form = $this->createDeleteForm($tbTipoApontamento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tbTipoApontamento);
            $em->flush();
        }

        return $this->redirectToRoute('tipoapontamento_index');
    }

    /**
     * Creates a form to delete a TbTipoApontamento entity.
     *
     * @param TbTipoApontamento $tbTipoApontamento The TbTipoApontamento entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TbTipoApontamento $tbTipoApontamento)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipoapontamento_delete', array('id' => $tbTipoApontamento->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
