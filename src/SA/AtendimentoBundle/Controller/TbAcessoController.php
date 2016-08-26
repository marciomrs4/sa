<?php

namespace SA\AtendimentoBundle\Controller;

use Doctrine\DBAL\Driver\PDOException;
use SA\AtendimentoBundle\Entity\TbUsuario;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SA\AtendimentoBundle\Entity\TbAcesso;
use SA\AtendimentoBundle\Form\TbAcessoType;

/**
 * TbAcesso controller.
 *
 * @Route("/admin/acesso")
 */
class TbAcessoController extends Controller
{
    /**
     * Lists all TbAcesso entities.
     *
     * @Route("/", name="acesso_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tbAcessos = $em->getRepository('SAAtendimentoBundle:TbAcesso')
            ->findAll();

        return $this->render('tbacesso/index.html.twig', array(
            'tbAcessos' => $tbAcessos,
        ));
    }

    /**
     * Creates a new TbAcesso entity.
     *
     * @Route("/new/{usuario}", name="acesso_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, TbUsuario $usuario)
    {

        $acessoRepository = $this->getDoctrine()
            ->getRepository('SAAtendimentoBundle:TbAcesso');

        $acesso = $acessoRepository->findOneBy(array('usuCodigo' => $usuario));


        if($acesso){

            return $this->redirectToRoute('acesso_show',array('id'=>$acesso->getId()));
        }

        $tbAcesso = new TbAcesso();

        $tbAcesso->setUsuCodigo($usuario);

        $form = $this->createForm('SA\AtendimentoBundle\Form\TbAcessoType', $tbAcesso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $password = $tbAcesso->getPassword();

            $encoder = $this->get('security.encoder_factory')->getEncoder($tbAcesso);

            $tbAcesso->setAceSenha(
                $encoder->encodePassword($password,
                                        $tbAcesso->getSalt()));

            $em->persist($tbAcesso);

            $em->flush();


            return $this->redirectToRoute('acesso_show', array('id' => $tbAcesso->getId()));
        }


        return $this->render('tbacesso/new.html.twig', array(
            'tbAcesso' => $tbAcesso,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TbAcesso entity.
     *
     * @Route("/{id}", name="acesso_show")
     * @Method("GET")
     */
    public function showAction(TbAcesso $tbAcesso)
    {
        $deleteForm = $this->createDeleteForm($tbAcesso);

        return $this->render('tbacesso/show.html.twig', array(
            'tbAcesso' => $tbAcesso,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TbAcesso entity.
     *
     * @Route("/{id}/edit", name="acesso_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TbAcesso $tbAcesso)
    {
        $tbAcesso->setAceSenha('');

        $deleteForm = $this->createDeleteForm($tbAcesso);
        $editForm = $this->createForm('SA\AtendimentoBundle\Form\TbAcessoType', $tbAcesso);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $password = $tbAcesso->getPassword();

            $encoder = $this->get('security.encoder_factory')->getEncoder($tbAcesso);

            $tbAcesso->setAceSenha(
                $encoder->encodePassword($password,
                    $tbAcesso->getSalt()));


            $em->persist($tbAcesso);
            $em->flush();

            return $this->redirectToRoute('acesso_show', array('id' => $tbAcesso->getId()));
        }

        return $this->render('tbacesso/edit.html.twig', array(
            'tbAcesso' => $tbAcesso,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TbAcesso entity.
     *
     * @Route("/{id}", name="acesso_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TbAcesso $tbAcesso)
    {
        $userId = $tbAcesso->getUsuCodigo()->getId();

        $form = $this->createDeleteForm($tbAcesso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tbAcesso);
            $em->flush();
        }

        return $this->redirectToRoute('acesso_new',array(
            'usuario' => $userId
        ));
    }

    /**
     * Creates a form to delete a TbAcesso entity.
     *
     * @param TbAcesso $tbAcesso The TbAcesso entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TbAcesso $tbAcesso)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('acesso_delete', array('id' => $tbAcesso->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
