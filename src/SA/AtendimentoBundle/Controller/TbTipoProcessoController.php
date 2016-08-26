<?php

namespace SA\AtendimentoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SA\AtendimentoBundle\Entity\TbTipoProcesso;
use SA\AtendimentoBundle\Form\TbTipoProcessoType;

/**
 * TbTipoProcesso controller.
 *
 * @Route("/cadastro/tipoprocesso")
 */
class TbTipoProcessoController extends Controller
{
    /**
     * Lists all TbTipoProcesso entities.
     *
     * @Route("/", name="tipoprocesso_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tbTipoProcessos = $em->getRepository('SAAtendimentoBundle:TbTipoProcesso')
            ->findBy(array(),array('ttpStatus'=>'DESC'));

        return $this->render('tbtipoprocesso/index.html.twig', array(
            'tbTipoProcessos' => $tbTipoProcessos,
        ));
    }

    /**
     * Creates a new TbTipoProcesso entity.
     *
     * @Route("/new", name="tipoprocesso_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tbTipoProcesso = new TbTipoProcesso();
        $form = $this->createForm('SA\AtendimentoBundle\Form\TbTipoProcessoType', $tbTipoProcesso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tbTipoProcesso);
            $em->flush();

            return $this->redirectToRoute('tipoprocesso_show', array('id' => $tbTipoProcesso->getId()));
        }

        return $this->render('tbtipoprocesso/new.html.twig', array(
            'tbTipoProcesso' => $tbTipoProcesso,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TbTipoProcesso entity.
     *
     * @Route("/{id}", name="tipoprocesso_show")
     * @Method("GET")
     */
    public function showAction(TbTipoProcesso $tbTipoProcesso)
    {
        $deleteForm = $this->createDeleteForm($tbTipoProcesso);

        return $this->render('tbtipoprocesso/show.html.twig', array(
            'tbTipoProcesso' => $tbTipoProcesso,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TbTipoProcesso entity.
     *
     * @Route("/{id}/edit", name="tipoprocesso_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TbTipoProcesso $tbTipoProcesso)
    {
        $deleteForm = $this->createDeleteForm($tbTipoProcesso);
        $editForm = $this->createForm('SA\AtendimentoBundle\Form\TbTipoProcessoType', $tbTipoProcesso);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tbTipoProcesso);
            $em->flush();

            return $this->redirectToRoute('tipoprocesso_show', array('id' => $tbTipoProcesso->getId()));
        }

        return $this->render('tbtipoprocesso/edit.html.twig', array(
            'tbTipoProcesso' => $tbTipoProcesso,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TbTipoProcesso entity.
     *
     * @Route("/{id}", name="tipoprocesso_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TbTipoProcesso $tbTipoProcesso)
    {
        $form = $this->createDeleteForm($tbTipoProcesso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tbTipoProcesso);
            $em->flush();
        }

        return $this->redirectToRoute('tipoprocesso_index');
    }

    /**
     * Creates a form to delete a TbTipoProcesso entity.
     *
     * @param TbTipoProcesso $tbTipoProcesso The TbTipoProcesso entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TbTipoProcesso $tbTipoProcesso)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipoprocesso_delete', array('id' => $tbTipoProcesso->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
