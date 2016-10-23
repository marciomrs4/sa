<?php

namespace SA\AtendimentoBundle\Controller;

use SA\AtendimentoBundle\Form\ListAtendimentoByPeriodType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SA\AtendimentoBundle\Entity\TbAtendimento;
use Symfony\Component\HttpFoundation\Response;
use SA\AtendimentoBundle\Form\AtendimentoAnaliticoSearchType;
use SA\AtendimentoBundle\Report;

/**
 * TbAtendimento controller.
 *
 * @Route("/search")
 */
class AtendimentoController extends Controller
{
    /**
     * @Route("/atendimento",name="atendimento_search")
     * @Method("GET")
     */
    public function searchAction()
    {
        return $this->render('@SAAtendimento/atendimento/search.html.twig');

    }

    /**
     * Finds and displays a TbAtendimento entity.
     *
     * @Route("/search", name="atendimento_search_show")
     * @Method("GET")
     */
    public function showAction(Request $request)
    {

        $protocolo = $request->query->getInt('protocolo');

        $tbAtendimento = $this->getDoctrine()->getRepository('SAAtendimentoBundle:TbAtendimento')
                ->find($protocolo);

        if(!$tbAtendimento){
            return $this->render('SAAtendimentoBundle:atendimento:error.html.twig',[
               'errors' => 'Protocolo não encontrado'
            ]);
        }

        return $this->render('@SAAtendimento/atendimento/show.html.twig', array(
            'tbAtendimento' => $tbAtendimento,
            'protocolo' => $protocolo
        ));

    }


    /**
     * @Route("/atendimentoanalitico",name="atendimento_analitico")
     */
    public function indexAnalictAtendimentoAction(Request $request)
    {

        ini_set("memory_limit","256M");

        $form = $this->createForm(AtendimentoAnaliticoSearchType::class,new TbAtendimento());

        $data = new \DateTime('now');

        $form->get('atDataRetornoB')
            ->setData($data);

        $form->get('atDataRetornoA')
            ->setData($data->modify('-240 day'));


        $tbAtendimentos = $this->getDoctrine()
            ->getManager()
            ->getRepository('SAAtendimentoBundle:TbAtendimento')
            ->listAllAtendimentoAnalitico($request->request->get('atendimento_analitico'));

        if($request->isMethod('POST')){
            $form->handleRequest($request);
        }

        return $this->render('@SAAtendimento/atendimento/indexanalictatendimento.html.twig', array(
            'tbAtendimentos' => $tbAtendimentos,
            'form' => $form->createView(),
        ));

    }

    /**
     * @return Response
     * @Route("/report/atendimento/analitico",name="report_atendimento_analitico")
     * @Method("GET")
     */
    public function reportAnalictAtendimentoAction(Request $request)
    {

        ini_set("memory_limit","256M");

        $data['atDataRetornoA'] = $request->query->get('atDataRetornoA');
        $data['atDataRetornoB'] = $request->query->get('atDataRetornoB');;
        $data['satCodigo'] = $request->query->get('satCodigo');
        $data['taCodigo'] = $request->query->get('taCodigo');

        $resultDataBase = $this->getDoctrine()
            ->getRepository('SAAtendimentoBundle:TbAtendimento')
            ->listAllAtendimentoAnalitico($data);

        $response = $this->get('report.atendimentoanalitico')
            ->createReportAtendimentoAnaliticoXLS($resultDataBase,
                                                  $this->getUser()->getUsuCodigo());

        return $response;

    }

    /**
     * @Route("/report/listatendimentobyperiod",name="list_atendimento_period")
     */
    public function listAtendimentoByPeriodAction(Request $request)
    {

        $form = $this->createForm(ListAtendimentoByPeriodType::class, new TbAtendimento());

        $data = new \DateTime('now');

        $form->get('atDataRetornoB')
            ->setData($data);

        $form->get('atDataRetornoA')
            ->setData($data->modify('-240 day'));

        $data = $request->request->get('atendimento_period');

        $tbAtendimentos = $this->getDoctrine()
            ->getManager()
            ->getRepository('SAAtendimentoBundle:TbAtendimento')
            ->listAtendimentoByPeriod($data['atDataRetornoA'],$data['atDataRetornoB']);

        if($request->isMethod('POST')){
            $form->handleRequest($request);
        }

        return $this->render('@SAAtendimento/atendimento/listatendimentobyperiod.html.twig',array(
            'form' => $form->createView(),
            'tbAtendimentos' => $tbAtendimentos
        ));

    }

    /**
     * @Route("/export/report/listatendimentobyperiod",name="export_list_atendimento_period")
     */
    public function exportListAtendimentoByPeriodAction(Request $request)
    {

        $data['atDataRetornoA'] = $request->query->get('atDataRetornoA');
        $data['atDataRetornoB'] = $request->query->get('atDataRetornoB');

        $tbAtendimentos = $this->getDoctrine()
            ->getManager()
            ->getRepository('SAAtendimentoBundle:TbAtendimento')
            ->listAtendimentoByPeriod($data['atDataRetornoA'],
                                      $data['atDataRetornoB']);


        $response =  $this->render('@SAAtendimento/atendimento/exportlistatendimentobyperiod.html.twig',array(
            'tbAtendimentos' => $tbAtendimentos
        ));

        $response->headers->set('Content-Type', 'text/csv');

        $response->headers->set('Content-Disposition', 'attachment; filename=AtendimentoPorPeriodo.csv');

        return $response;

    }

    /**
     * @Route("/report/atendimentobystatus",name="atendimento_status")
     */
    public function atendimentoByStatusAction(Request $request)
    {

        $form = $this->createForm(ListAtendimentoByPeriodType::class, new TbAtendimento());

        $data = new \DateTime('now');

        $form->get('atDataRetornoB')
            ->setData($data);

        $form->get('atDataRetornoA')
            ->setData($data->modify('-240 day'));

        $data = $request->request->get('atendimento_period');

        $tbAtendimentos = $this->getDoctrine()
            ->getManager()
            ->getRepository('SAAtendimentoBundle:TbAtendimento')
            ->atendimentoByStatus($data['atDataRetornoA'],$data['atDataRetornoB']);

        if($request->isMethod('POST')){
            $form->handleRequest($request);
        }

        $atendimento = \GuzzleHttp\json_encode($tbAtendimentos);

        return $this->render('@SAAtendimento/atendimento/atendimentobystatus.html.twig',array(
            'form' => $form->createView(),
            'tbAtendimentos' => $tbAtendimentos,
            'atedimento' => $atendimento
        ));

    }

    /**
     * @Route("/report/atendimentobytipostatus",name="atendimento_tipo_status")
     */
    public function atendimentoByTipoStatusAction(Request $request)
    {

        $form = $this->createForm(ListAtendimentoByPeriodType::class, new TbAtendimento());

        $data = new \DateTime('now');

        $form->get('atDataRetornoB')
            ->setData($data);

        $form->get('atDataRetornoA')
            ->setData($data->modify('-240 day'));

        $data = $request->request->get('atendimento_period');

        $tbAtendimentos = $this->getDoctrine()
            ->getManager()
            ->getRepository('SAAtendimentoBundle:TbAtendimento')
            ->atendimentoByTipoAndStatus($data['atDataRetornoA'],$data['atDataRetornoB']);

        if($request->isMethod('POST')){
            $form->handleRequest($request);
        }

        return $this->render('@SAAtendimento/atendimento/atendimentobytipostatus.html.twig',array(
            'form' => $form->createView(),
            'tbAtendimentos' => $tbAtendimentos
        ));

    }

}
