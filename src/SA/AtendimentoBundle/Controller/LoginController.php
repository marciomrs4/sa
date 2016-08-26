<?php

namespace SA\AtendimentoBundle\Controller;

use SA\AtendimentoBundle\Entity\TbAcesso;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;


class LoginController extends Controller
{
    /**
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/login", name="user_login")
     * @Template()
     */
    public function loginAction()
    {

        $authenticationUtils = $this->get('security.authentication_utils');

        //$user = new TbAcesso();
        //$encoder = $this->get('security.encoder_factory')->getEncoder($user);
        //$encoder = $this->get('security.password_encoder')->encodePassword($user,'123456')   ;

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        //\Doctrine\Common\Util\Debug::dump($this->getDoctrine()->getEntityManager()->find('SAAtendimentoBundle:TbAcesso', 13));

        return array(
            // last username entered by the user
            'last_username' => $lastUsername,
            'error'         => $error,
        );

        //return $this->render('SAAtendimentoBundle:Login:index.html.twig');
    }


    /**
     * @Route("login_check", name="login_check")
     */
    public function loginCheckAction()
    {

    }


    /**
     * @Route("/logout", name="user_logout")
     */
    public function logoutAction()
    {

    }

}
