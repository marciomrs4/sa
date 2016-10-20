<?php

namespace SA\AtendimentoBundle\Controller;

use SA\AtendimentoBundle\Entity\TbAtendimento;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SA\AtendimentoBundle\Entity\ContatoAtendimento;
use SA\AtendimentoBundle\Form\ContatoAtendimentoType;

/**
 * ContatoAtendimento controller.
 *
 * @Route("/atendimento/contatoatendimento")
 */
class ContatoAtendimentoController extends Controller
{
    /**
     * Lists all ContatoAtendimento entities.
     *
     * @Route("/{atendimento}", name="contatoatendimento_index")
     * @Method("GET")
     */
    public function indexAction($atendimento)
    {
        $em = $this->getDoctrine()->getManager();

        $contatoAtendimentos = $em->getRepository('SAAtendimentoBundle:ContatoAtendimento')
            ->findBy(array('atendimentoId'=>$atendimento));

        $tbAtendimento = $this->getDoctrine()
            ->getRepository('SAAtendimentoBundle:TbAtendimento')
            ->find($atendimento);

        return $this->render('contatoatendimento/index.html.twig', array(
            'contatoAtendimentos' => $contatoAtendimentos,
            'tbAtendimento' => $tbAtendimento,
            'atendimento' => $atendimento
        ));
    }

    /**
     * Creates a new ContatoAtendimento entity.
     *
     * @Route("/new/{atendimento}", name="contatoatendimento_new")
     * @Method({"GET", "POST"})
     */
    public function newAction($atendimento, Request $request)
    {
        $contatoAtendimento = new ContatoAtendimento();
        $contatoAtendimento->setAtendimentoId($atendimento);
        $form = $this->createForm('SA\AtendimentoBundle\Form\ContatoAtendimentoType', $contatoAtendimento);
        $form->handleRequest($request);

        $tbAtendimento = $this->getDoctrine()
            ->getRepository('SAAtendimentoBundle:TbAtendimento')
            ->find($atendimento);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $contatoAtendimento->setDateCriacao(new \DateTime('now'));
            $contatoAtendimento->setUserCreator($this->getUser()->getAceUsuario());

            $em->persist($contatoAtendimento);
            $em->flush();

            return $this->redirectToRoute('contatoatendimento_show', array('id' => $contatoAtendimento->getId()));
        }

        return $this->render('contatoatendimento/new.html.twig', array(
            'contatoAtendimento' => $contatoAtendimento,
            'tbAtendimento' => $tbAtendimento,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ContatoAtendimento entity.
     *
     * @Route("/{id}/show", name="contatoatendimento_show")
     * @Method("GET")
     */
    public function showAction(ContatoAtendimento $contatoAtendimento)
    {
        $deleteForm = $this->createDeleteForm($contatoAtendimento);

        $tbAtendimento = $this->getDoctrine()
            ->getRepository('SAAtendimentoBundle:TbAtendimento')
            ->find($contatoAtendimento->getAtendimentoId());

        return $this->render('contatoatendimento/show.html.twig', array(
            'contatoAtendimento' => $contatoAtendimento,
            'tbAtendimento' => $tbAtendimento,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ContatoAtendimento entity.
     *
     * @Route("/{id}/edit", name="contatoatendimento_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ContatoAtendimento $contatoAtendimento)
    {
        $deleteForm = $this->createDeleteForm($contatoAtendimento);
        $editForm = $this->createForm('SA\AtendimentoBundle\Form\ContatoAtendimentoType', $contatoAtendimento);
        $editForm->handleRequest($request);

        $tbAtendimento = $this->getDoctrine()
            ->getRepository('SAAtendimentoBundle:TbAtendimento')
            ->find($contatoAtendimento->getAtendimentoId());

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $contatoAtendimento->setDateUpdate(new \DateTime('now'));
            $contatoAtendimento->setUserUpdate($this->getUser()->getAceUsuario());

            $em->persist($contatoAtendimento);
            $em->flush();

            return $this->redirectToRoute('contatoatendimento_show', array('id' => $contatoAtendimento->getId()));
        }

        return $this->render('contatoatendimento/edit.html.twig', array(
            'contatoAtendimento' => $contatoAtendimento,
            'tbAtendimento' => $tbAtendimento,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ContatoAtendimento entity.
     *
     * @Route("/{id}", name="contatoatendimento_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ContatoAtendimento $contatoAtendimento)
    {
        $atendimento = $contatoAtendimento->getAtendimentoId();

        $form = $this->createDeleteForm($contatoAtendimento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contatoAtendimento);
            $em->flush();
        }

        return $this->redirectToRoute('contatoatendimento_index',array( 'atendimento' => $atendimento));
    }

    /**
     * Creates a form to delete a ContatoAtendimento entity.
     *
     * @param ContatoAtendimento $contatoAtendimento The ContatoAtendimento entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ContatoAtendimento $contatoAtendimento)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contatoatendimento_delete', array('id' => $contatoAtendimento->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
