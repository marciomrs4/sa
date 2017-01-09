<?php

namespace SA\AtendimentoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SA\AtendimentoBundle\Entity\TbTipoDirecionamento;
use SA\AtendimentoBundle\Form\TbTipoDirecionamentoType;

/**
 * TbTipoDirecionamento controller.
 *
 * @Route("/cadastro/tipodirecionamento")
 */
class TbTipoDirecionamentoController extends Controller
{
    /**
     * Lists all TbTipoDirecionamento entities.
     *
     * @Route("/", name="tipodirecionamento_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tbTipoDirecionamentos = $em->getRepository('SAAtendimentoBundle:TbTipoDirecionamento')
            ->findBy(array(),array('tdAtivo'=>'ASC'));

        return $this->render('tbtipodirecionamento/index.html.twig', array(
            'tbTipoDirecionamentos' => $tbTipoDirecionamentos,
        ));
    }

    /**
     * Creates a new TbTipoDirecionamento entity.
     *
     * @Route("/new", name="tipodirecionamento_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tbTipoDirecionamento = new TbTipoDirecionamento();
        $form = $this->createForm('SA\AtendimentoBundle\Form\TbTipoDirecionamentoType', $tbTipoDirecionamento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tbTipoDirecionamento);
            $em->flush();

            return $this->redirectToRoute('tipodirecionamento_show', array('id' => $tbTipoDirecionamento->getId()));
        }

        return $this->render('tbtipodirecionamento/new.html.twig', array(
            'tbTipoDirecionamento' => $tbTipoDirecionamento,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TbTipoDirecionamento entity.
     *
     * @Route("/{id}", name="tipodirecionamento_show")
     * @Method("GET")
     */
    public function showAction(TbTipoDirecionamento $tbTipoDirecionamento)
    {
        $deleteForm = $this->createDeleteForm($tbTipoDirecionamento);

        return $this->render('tbtipodirecionamento/show.html.twig', array(
            'tbTipoDirecionamento' => $tbTipoDirecionamento,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TbTipoDirecionamento entity.
     *
     * @Route("/{id}/edit", name="tipodirecionamento_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TbTipoDirecionamento $tbTipoDirecionamento)
    {
        $deleteForm = $this->createDeleteForm($tbTipoDirecionamento);
        $editForm = $this->createForm('SA\AtendimentoBundle\Form\TbTipoDirecionamentoType', $tbTipoDirecionamento);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tbTipoDirecionamento);
            $em->flush();

            return $this->redirectToRoute('tipodirecionamento_show', array('id' => $tbTipoDirecionamento->getId()));
        }

        return $this->render('tbtipodirecionamento/edit.html.twig', array(
            'tbTipoDirecionamento' => $tbTipoDirecionamento,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TbTipoDirecionamento entity.
     *
     * @Route("/{id}", name="tipodirecionamento_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TbTipoDirecionamento $tbTipoDirecionamento)
    {
        $form = $this->createDeleteForm($tbTipoDirecionamento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tbTipoDirecionamento);
            $em->flush();
        }

        return $this->redirectToRoute('tipodirecionamento_index');
    }

    /**
     * Creates a form to delete a TbTipoDirecionamento entity.
     *
     * @param TbTipoDirecionamento $tbTipoDirecionamento The TbTipoDirecionamento entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TbTipoDirecionamento $tbTipoDirecionamento)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipodirecionamento_delete', array('id' => $tbTipoDirecionamento->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
