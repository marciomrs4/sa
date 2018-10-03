<?php

namespace SA\AtendimentoBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SA\AtendimentoBundle\Entity\TbAcesso;
use SA\AtendimentoBundle\Form\TbAcessoType;

/**
 * TbUsuario controller.
 *
 * @Route("/user")
 */
class AccessUserController extends Controller
{


    /**
     * Finds and displays a TbAcesso entity.
     *
     * @Route("/{id}", name="user_acesso_show")
     * @Method("GET")
     */
    public function showAction(TbAcesso $tbAcesso)
    {

        return $this->render('accessuser/show.html.twig', array(
            'tbAcesso' => $tbAcesso,
        ));
    }



    /**
     * Displays a form to edit an existing TbAcesso entity.
     *
     * @Route("/{id}/edit", name="user_acesso_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TbAcesso $tbAcesso)
    {
        $tbAcesso->setAceSenha('');

        $editForm = $this->createForm('SA\AtendimentoBundle\Form\TbAcessoType', $tbAcesso);

        $editForm->remove('aceAtivo')
                 ->remove('aceUsuario');

        $editForm->add('senha2',PasswordType::class,[
                                        'label' => 'Repetir Senha',
                                        'mapped' => false]);

        $editForm->handleRequest($request);


        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $user = $this->get('security.token_storage')->getToken()->getUser();

            $senha = $editForm->get('aceSenha')->getData();
            $senha2 = $editForm->get('senha2')->getData();

            $senha = trim($senha);
            $senha2 = trim($senha2);

            if(($user == $tbAcesso) and ($senha == $senha2)) {

                $em = $this->getDoctrine()->getManager();

                $password = $tbAcesso->getPassword();

                $encoder = $this->get('security.encoder_factory')->getEncoder($tbAcesso);

                $tbAcesso->setAceSenha(
                    $encoder->encodePassword($password,
                        $tbAcesso->getSalt()));


                $em->persist($tbAcesso);
                $em->flush();

                $message = ['type' => 'success', 'message' => 'Senha alterada com sucesso.'];

                $this->addFlash('info',$message);

                return $this->redirectToRoute('user_acesso_show', array('id' => $tbAcesso->getId()));

            }else{

                $message = ['type' => 'warning', 'message' => 'As senhas não são iguais.'];

                $this->addFlash('info',$message);

                return $this->render('accessuser/edit.html.twig', array(
                    'tbAcesso' => $tbAcesso,
                    'edit_form' => $editForm->createView()
                ));

            }
        }

        return $this->render('accessuser/edit.html.twig', array(
            'tbAcesso' => $tbAcesso,
            'edit_form' => $editForm->createView()
        ));
    }

}
