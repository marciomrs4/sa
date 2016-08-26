<?php

namespace SA\AtendimentoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SA\AtendimentoBundle\Entity\TbTipoResposta;
use SA\AtendimentoBundle\Form\TbTipoRespostaType;

/**
 * TbTipoResposta controller.
 *
 * @Route("/cadastro/tiporesposta")
 */
class TbTipoRespostaController extends Controller
{
    /**
     * Lists all TbTipoResposta entities.
     *
     * @Route("/", name="tiporesposta_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tbTipoRespostas = $em->getRepository('SAAtendimentoBundle:TbTipoResposta')->findAll();


        return $this->render('tbtiporesposta/index.html.twig', array(
            'tbTipoRespostas' => $tbTipoRespostas,
        ));
    }

    /**
     * Creates a new TbTipoResposta entity.
     *
     * @Route("/new", name="tiporesposta_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tbTipoRespostum = new TbTipoResposta();
        $form = $this->createForm('SA\AtendimentoBundle\Form\TbTipoRespostaType', $tbTipoRespostum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tbTipoRespostum);
            $em->flush();

            return $this->redirectToRoute('tiporesposta_show', array('id' => $tbTipoRespostum->getId()));
        }

        return $this->render('tbtiporesposta/new.html.twig', array(
            'tbTipoRespostum' => $tbTipoRespostum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TbTipoResposta entity.
     *
     * @Route("/{id}", name="tiporesposta_show")
     * @Method("GET")
     */
    public function showAction(TbTipoResposta $tbTipoRespostum)
    {
        $deleteForm = $this->createDeleteForm($tbTipoRespostum);

        return $this->render('tbtiporesposta/show.html.twig', array(
            'tbTipoRespostum' => $tbTipoRespostum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TbTipoResposta entity.
     *
     * @Route("/{id}/edit", name="tiporesposta_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TbTipoResposta $tbTipoRespostum)
    {
        $deleteForm = $this->createDeleteForm($tbTipoRespostum);
        $editForm = $this->createForm('SA\AtendimentoBundle\Form\TbTipoRespostaType', $tbTipoRespostum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tbTipoRespostum);
            $em->flush();

            return $this->redirectToRoute('tiporesposta_edit', array('id' => $tbTipoRespostum->getId()));
        }

        return $this->render('tbtiporesposta/edit.html.twig', array(
            'tbTipoRespostum' => $tbTipoRespostum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TbTipoResposta entity.
     *
     * @Route("/{id}", name="tiporesposta_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TbTipoResposta $tbTipoRespostum)
    {
        $form = $this->createDeleteForm($tbTipoRespostum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tbTipoRespostum);
            $em->flush();
        }

        return $this->redirectToRoute('tiporesposta_index');
    }

    /**
     * Creates a form to delete a TbTipoResposta entity.
     *
     * @param TbTipoResposta $tbTipoRespostum The TbTipoResposta entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TbTipoResposta $tbTipoRespostum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tiporesposta_delete', array('id' => $tbTipoRespostum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
