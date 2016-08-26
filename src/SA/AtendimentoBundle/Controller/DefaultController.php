<?php

namespace SA\AtendimentoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    /**
     * @Route("/home/dashboard", name="home")
     */
    public function dashBoardAction()
    {
        return $this->render('SAAtendimentoBundle:Default:home.html.twig');
    }

    /**
     * @Route("/home", name="home")
     */
    public function homeAction()
    {
        return $this->render('SAAtendimentoBundle:Default:home.html.twig');
    }

    /**
     * @Route("/",name="index")
     */
    public function indexAction()
    {
        return $this->redirectToRoute('home');
    }


}
