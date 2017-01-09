<?php

namespace SA\AtendimentoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SA\AtendimentoBundle\Entity\TbTipoAtendimento;
use SA\AtendimentoBundle\Form\TbTipoAtendimentoType;

/**
 * TbTipoAtendimento controller.
 *
 * @Route("/cadastro/tipoatendimento")
 */
class TbTipoAtendimentoController extends Controller
{
    /**
     * Lists all TbTipoAtendimento entities.
     *
     * @Route("/", name="tipoatendimento_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tbTipoAtendimentos = $em->getRepository('SAAtendimentoBundle:TbTipoAtendimento')->findAll();

        return $this->render('tbtipoatendimento/index.html.twig', array(
            'tbTipoAtendimentos' => $tbTipoAtendimentos,
        ));
    }

    /**
     * Creates a new TbTipoAtendimento entity.
     *
     * @Route("/new", name="tipoatendimento_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tbTipoAtendimento = new TbTipoAtendimento();
        $form = $this->createForm('SA\AtendimentoBundle\Form\TbTipoAtendimentoType', $tbTipoAtendimento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tbTipoAtendimento);
            $em->flush();

            return $this->redirectToRoute('tipoatendimento_show', array('id' => $tbTipoAtendimento->getId()));
        }

        return $this->render('tbtipoatendimento/new.html.twig', array(
            'tbTipoAtendimento' => $tbTipoAtendimento,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TbTipoAtendimento entity.
     *
     * @Route("/{id}", name="tipoatendimento_show")
     * @Method("GET")
     */
    public function showAction(TbTipoAtendimento $tbTipoAtendimento)
    {
        $deleteForm = $this->createDeleteForm($tbTipoAtendimento);

        return $this->render('tbtipoatendimento/show.html.twig', array(
            'tbTipoAtendimento' => $tbTipoAtendimento,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TbTipoAtendimento entity.
     *
     * @Route("/{id}/edit", name="tipoatendimento_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TbTipoAtendimento $tbTipoAtendimento)
    {
        $deleteForm = $this->createDeleteForm($tbTipoAtendimento);
        $editForm = $this->createForm('SA\AtendimentoBundle\Form\TbTipoAtendimentoType', $tbTipoAtendimento);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tbTipoAtendimento);
            $em->flush();

            return $this->redirectToRoute('tipoatendimento_show', array('id' => $tbTipoAtendimento->getId()));
        }

        return $this->render('tbtipoatendimento/edit.html.twig', array(
            'tbTipoAtendimento' => $tbTipoAtendimento,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TbTipoAtendimento entity.
     *
     * @Route("/{id}", name="tipoatendimento_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TbTipoAtendimento $tbTipoAtendimento)
    {
        $form = $this->createDeleteForm($tbTipoAtendimento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tbTipoAtendimento);
            $em->flush();
        }

        return $this->redirectToRoute('tipoatendimento_index');
    }

    /**
     * Creates a form to delete a TbTipoAtendimento entity.
     *
     * @param TbTipoAtendimento $tbTipoAtendimento The TbTipoAtendimento entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TbTipoAtendimento $tbTipoAtendimento)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipoatendimento_delete', array('id' => $tbTipoAtendimento->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
