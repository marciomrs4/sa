<?php

namespace SA\AtendimentoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SA\AtendimentoBundle\Form\ProdutoReportType;


/**
 * Protudot controller.
 *
 * @Route("/search")
 */
class ProdutoReportController extends Controller
{
    /**
     * @Route("/report/produtobydatacadastro", name="report_produto_bydatacadastro")
     */
    public function produtoByDataCadastroAction(Request $request)
    {

        $form = $this->createForm(ProdutoReportType::class);

        $date = new \DateTime('now');

        $form->get('dataFinal')
            ->setData($date);

        $form->get('dataInicial')
            ->setData($date->modify('-30 days'));

        //$form->handleRequest($request);

        $produto = '';

        if($request->getMethod() == 'POST'){

            $form->handleRequest($request);

            $produto = $this->getDoctrine()
                ->getRepository('SAAtendimentoBundle:Produto')
                ->reportProdutoByDataCadastro($request->request->get('report_produto'));
        }

        return $this->render('@SAAtendimento/reportproduto/bydatacadastro.html.twig',[
                'form' => $form->createView(),
                'produtos' => $produto
            ]);

    }

    /**
     * @Route("/report/produtostoexcel/bydatacadastro",name="report_excel_bydatacadastro")
     */
    public function produtosExcelByDataCadastroAction(Request $request)
    {

        $data['codigoTp'] = $request->query->get('codigoTp');
        $data['codigoScodes'] = $request->query->get('codigoScodes');
        $data['descricao'] = $request->query->get('descricao');
        $data['status'] = $request->query->get('status');
        $data['dataInicial'] = $request->query->get('dataInicial');
        $data['dataFinal'] = $request->query->get('dataFinal');

        $produtos = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('SAAtendimentoBundle:Produto')
                         ->reportProdutoByDataCadastro($data);


        $response =  $this->render('@SAAtendimento/reportproduto/export_by_data_cadastro.html.twig',array(
            'produtos' => $produtos
        ));

        $response->headers->set('Content-Type', 'text/csv');

        $response->headers->set('Content-Disposition', 'attachment; filename=ProdutosPorDataDeCadastro.csv');

        return $response;

    }


    /**
     * @Route("/report/produtobydataretorno", name="report_produto_bydataretorno")
     */
    public function produtoByDataRetornoAction(Request $request)
    {

        $form = $this->createForm(ProdutoReportType::class);

        $date = new \DateTime('now');

        $form->get('dataFinal')
            ->setData($date);

        $form->get('dataInicial')
            ->setData($date->modify('-30 days'));

        //$form->handleRequest($request);

        $produto = '';

        if($request->getMethod() == 'POST'){

            $form->handleRequest($request);

            $produto = $this->getDoctrine()
                ->getRepository('SAAtendimentoBundle:Produto')
                ->reportProdutoByDataRetorno($request->request->get('report_produto'));
        }

        return $this->render('@SAAtendimento/reportproduto/bydataretorno.html.twig',[
            'form' => $form->createView(),
            'produtos' => $produto
        ]);

    }

    /**
     * @Route("/report/produtostoexcel/bydataretorno",name="report_excel_bydataretorno")
     */
    public function produtosExcelByDataRetornoAction(Request $request)
    {

        $data['codigoTp'] = $request->query->get('codigoTp');
        $data['codigoScodes'] = $request->query->get('codigoScodes');
        $data['descricao'] = $request->query->get('descricao');
        $data['status'] = $request->query->get('status');
        $data['dataInicial'] = $request->query->get('dataInicial');
        $data['dataFinal'] = $request->query->get('dataFinal');

        $produtos = $this->getDoctrine()
            ->getManager()
            ->getRepository('SAAtendimentoBundle:Produto')
            ->reportProdutoByDataRetorno($data);


        $response =  $this->render('@SAAtendimento/reportproduto/export_by_data_retorno.html.twig',array(
            'produtos' => $produtos
        ));

        $response->headers->set('Content-Type', 'text/csv');

        $response->headers->set('Content-Disposition', 'attachment; filename=ProdutosPorDataDeRetorno.csv');

        return $response;

    }



}
