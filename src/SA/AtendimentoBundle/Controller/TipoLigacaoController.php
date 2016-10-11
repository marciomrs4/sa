<?php

namespace SA\AtendimentoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SA\AtendimentoBundle\Entity\TipoLigacao;
use SA\AtendimentoBundle\Form\TipoLigacaoType;

/**
 * TipoLigacao controller.
 *
 * @Route("/cadastro/tipoligacao")
 */
class TipoLigacaoController extends Controller
{
    /**
     * Lists all TipoLigacao entities.
     *
     * @Route("/", name="cadastro_tipoligacao_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tipoLigacaos = $em->getRepository('SAAtendimentoBundle:TipoLigacao')->findAll();

        return $this->render('tipoligacao/index.html.twig', array(
            'tipoLigacaos' => $tipoLigacaos,
        ));
    }

    /**
     * Creates a new TipoLigacao entity.
     *
     * @Route("/new", name="cadastro_tipoligacao_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tipoLigacao = new TipoLigacao();
        $form = $this->createForm('SA\AtendimentoBundle\Form\TipoLigacaoType', $tipoLigacao);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoLigacao);
            $em->flush();

            return $this->redirectToRoute('cadastro_tipoligacao_show', array('id' => $tipoLigacao->getId()));
        }

        return $this->render('tipoligacao/new.html.twig', array(
            'tipoLigacao' => $tipoLigacao,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TipoLigacao entity.
     *
     * @Route("/{id}", name="cadastro_tipoligacao_show")
     * @Method("GET")
     */
    public function showAction(TipoLigacao $tipoLigacao)
    {
        $deleteForm = $this->createDeleteForm($tipoLigacao);

        return $this->render('tipoligacao/show.html.twig', array(
            'tipoLigacao' => $tipoLigacao,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TipoLigacao entity.
     *
     * @Route("/{id}/edit", name="cadastro_tipoligacao_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TipoLigacao $tipoLigacao)
    {
        $deleteForm = $this->createDeleteForm($tipoLigacao);
        $editForm = $this->createForm('SA\AtendimentoBundle\Form\TipoLigacaoType', $tipoLigacao);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipoLigacao);
            $em->flush();

            return $this->redirectToRoute('cadastro_tipoligacao_edit', array('id' => $tipoLigacao->getId()));
        }

        return $this->render('tipoligacao/edit.html.twig', array(
            'tipoLigacao' => $tipoLigacao,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TipoLigacao entity.
     *
     * @Route("/{id}", name="cadastro_tipoligacao_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TipoLigacao $tipoLigacao)
    {
        $form = $this->createDeleteForm($tipoLigacao);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tipoLigacao);
            $em->flush();
        }

        return $this->redirectToRoute('cadastro_tipoligacao_index');
    }

    /**
     * Creates a form to delete a TipoLigacao entity.
     *
     * @param TipoLigacao $tipoLigacao The TipoLigacao entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TipoLigacao $tipoLigacao)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cadastro_tipoligacao_delete', array('id' => $tipoLigacao->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
