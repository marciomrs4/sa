<?php

namespace SA\AtendimentoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SA\AtendimentoBundle\Form\IndicadorProdutividadeType;


/**
 * IndicadorReport controller.
 *
 * @Route("/search")
 */
class IndicadorReportController extends Controller
{
    /**
     * @Route("/report/indicador/produtividade", name="report_indicador_produtividade")
     */
    public function indexAction(Request $request)
    {

        $form = $this->createForm(IndicadorProdutividadeType::class);

        $date = new \DateTime('now');

        $form->get('dataFinal')->setData($date);

        $form->get('dataInicial')->setData($date->modify('-30 days'));

        $form->handleRequest($request);

        $atendimentos = '';
        $apontamentos = '';
        $apontamentoProdutos = '';

        if($form->isSubmitted()){

            $data = $request->request->get('indicador_produtividade');

            $atendimentos = $this->getDoctrine()
                ->getRepository('SAAtendimentoBundle:TbAtendimento')
                ->reportIndicadorProdutividade($data);

            $apontamentos = $this->getDoctrine()
                ->getRepository('SAAtendimentoBundle:TbApontamento')
                ->reportIndicadorProdutividade($data);

            $apontamentoProdutos = $this->getDoctrine()
                ->getRepository('SAAtendimentoBundle:ApontamentoProduto')
                ->reportIndicadorProdutividade($data);


        }

        return $this->render('@SAAtendimento/indicadores/index.html.twig',[
                'form' => $form->createView(),
                'atendimentos' => $atendimentos,
                'apontamentos' => $apontamentos,
                'apontamentoProdutos' => $apontamentoProdutos
            ]);

    }

}
