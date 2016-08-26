<?php

namespace SA\AtendimentoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SA\AtendimentoBundle\Entity\TbUsuario;
use SA\AtendimentoBundle\Form\TbUsuarioType;

/**
 * TbUsuario controller.
 *
 * @Route("/admin/usuario")
 */
class TbUsuarioController extends Controller
{
    /**
     * Lists all TbUsuario entities.
     *
     * @Route("/", name="admin_usuario_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tbUsuarios = $em->getRepository('SAAtendimentoBundle:TbUsuario')
            ->findAll();

        return $this->render('@SAAtendimento/tbusuario/index.html.twig', array(
            'tbUsuarios' => $tbUsuarios,
        ));
    }

    /**
     * Creates a new TbUsuario entity.
     *
     * @Route("/new", name="admin_usuario_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tbUsuario = new TbUsuario();
        $form = $this->createForm('SA\AtendimentoBundle\Form\TbUsuarioType', $tbUsuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tbUsuario);
            $em->flush();

            return $this->redirectToRoute('admin_usuario_show', array('id' => $tbUsuario->getId()));
        }

        return $this->render('@SAAtendimento/tbusuario/new.html.twig', array(
            'tbUsuario' => $tbUsuario,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TbUsuario entity.
     *
     * @Route("/{id}", name="admin_usuario_show")
     * @Method("GET")
     */
    public function showAction(TbUsuario $tbUsuario)
    {
        $deleteForm = $this->createDeleteForm($tbUsuario);

        return $this->render('@SAAtendimento/tbusuario/show.html.twig', array(
            'tbUsuario' => $tbUsuario,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TbUsuario entity.
     *
     * @Route("/{id}/edit", name="admin_usuario_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TbUsuario $tbUsuario)
    {
        $deleteForm = $this->createDeleteForm($tbUsuario);
        $editForm = $this->createForm('SA\AtendimentoBundle\Form\TbUsuarioType', $tbUsuario);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tbUsuario);
            $em->flush();

            return $this->redirectToRoute('admin_usuario_show', array('id' => $tbUsuario->getId()));
        }

        return $this->render('@SAAtendimento/tbusuario/edit.html.twig', array(
            'tbUsuario' => $tbUsuario,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TbUsuario entity.
     *
     * @Route("/{id}", name="admin_usuario_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TbUsuario $tbUsuario)
    {
        $form = $this->createDeleteForm($tbUsuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tbUsuario);
            $em->flush();
        }

        return $this->redirectToRoute('admin_usuario_index');
    }

    /**
     * Creates a form to delete a TbUsuario entity.
     *
     * @param TbUsuario $tbUsuario The TbUsuario entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TbUsuario $tbUsuario)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_usuario_delete', array('id' => $tbUsuario->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
