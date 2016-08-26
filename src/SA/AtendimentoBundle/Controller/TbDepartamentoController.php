<?php

namespace SA\AtendimentoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SA\AtendimentoBundle\Entity\TbDepartamento;
use SA\AtendimentoBundle\Form\TbDepartamentoType;

/**
 * TbDepartamento controller.
 *
 * @Route("/admin/departamento")
 */
class TbDepartamentoController extends Controller
{
    /**
     * Lists all TbDepartamento entities.
     *
     * @Route("/", name="adm_departamento_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $tbDepartamentos = $em->getRepository('SAAtendimentoBundle:TbDepartamento')->findAll();

        /*
        $tbDepartamentos = $this->get('knp_paginator')
                                ->paginate($DepartamentoEntity,
                                           $request->query->getInt('page',1),
                                           5);
        */

        return $this->render('@SAAtendimento/tbdepartamento/index.html.twig', array(
            'tbDepartamentos' => $tbDepartamentos,
        ));
    }

    /**
     * Creates a new TbDepartamento entity.
     *
     * @Route("/new", name="adm_departamento_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tbDepartamento = new TbDepartamento();
        $form = $this->createForm('SA\AtendimentoBundle\Form\TbDepartamentoType', $tbDepartamento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tbDepartamento);
            $em->flush();

            return $this->redirectToRoute('adm_departamento_show', array('id' => $tbDepartamento->getId()));
        }

        return $this->render('@SAAtendimento/tbdepartamento/new.html.twig', array(
            'tbDepartamento' => $tbDepartamento,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TbDepartamento entity.
     *
     * @Route("/{id}", name="adm_departamento_show")
     * @Method("GET")
     */
    public function showAction(TbDepartamento $tbDepartamento)
    {
        $deleteForm = $this->createDeleteForm($tbDepartamento);

        return $this->render('@SAAtendimento/tbdepartamento/show.html.twig', array(
            'tbDepartamento' => $tbDepartamento,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TbDepartamento entity.
     *
     * @Route("/{id}/edit", name="adm_departamento_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TbDepartamento $tbDepartamento)
    {
        $deleteForm = $this->createDeleteForm($tbDepartamento);
        $editForm = $this->createForm('SA\AtendimentoBundle\Form\TbDepartamentoType', $tbDepartamento);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tbDepartamento);
            $em->flush();

            return $this->redirectToRoute('adm_departamento_show', array('id' => $tbDepartamento->getId()));
        }

        return $this->render('@SAAtendimento/tbdepartamento/edit.html.twig', array(
            'tbDepartamento' => $tbDepartamento,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TbDepartamento entity.
     *
     * @Route("/{id}", name="adm_departamento_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TbDepartamento $tbDepartamento)
    {
        $form = $this->createDeleteForm($tbDepartamento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tbDepartamento);
            $em->flush();
        }

        return $this->redirectToRoute('adm_departamento_index');
    }

    /**
     * Creates a form to delete a TbDepartamento entity.
     *
     * @param TbDepartamento $tbDepartamento The TbDepartamento entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TbDepartamento $tbDepartamento)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adm_departamento_delete', array('id' => $tbDepartamento->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
