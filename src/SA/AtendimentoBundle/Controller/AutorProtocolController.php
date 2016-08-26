<?php

namespace SA\AtendimentoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SA\AtendimentoBundle\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Validator\Constraints\DateTime;


class AutorProtocolController extends Controller
{
    /**
     * @Route("/search/protocolo", name="protocolo")
     */
    public function indexAction()
    {

        $cliente =  new HttpClient();

        $cliente->request('GET','http://sistema3.saude.sp.gov.br/scodesws/api/autor/protocolo/01061742014');

        $request = $cliente->getInternalResponse();


        return new Response(var_dump($request->getContent()));

    }



}
