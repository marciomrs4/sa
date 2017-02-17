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
     * @Route("/report/produto", name="report_produto")
     */
    public function indexAction(Request $request)
    {

        $form = $this->createForm(ProdutoReportType::class);

        $date = new \DateTime('now');

        $form->get('dataFinal')
            ->setData($date);

        $form->get('dataInicial')
            ->setData($date->modify('-30 days'));

        $form->handleRequest($request);

        $produto = '';

        if($form->isSubmitted()){

            $produto = $this->getDoctrine()
                ->getRepository('SAAtendimentoBundle:Produto')
                ->reportProduto($request->request->get('report_produto'));
        }

        return $this->render('@SAAtendimento/reportproduto/index.html.twig',[
                'form' => $form->createView(),
                'produtos' => $produto
            ]);

    }

    /**
     * @Route("/report/produtostoexcel",name="report_produto_to_excel")
     */
    public function produtosToExcelAction(Request $request)
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
                         ->reportProduto($data);


        $response =  $this->render('@SAAtendimento/reportproduto/export.html.twig',array(
            'produtos' => $produtos
        ));

        $response->headers->set('Content-Type', 'text/csv');

        $response->headers->set('Content-Disposition', 'attachment; filename=Produtos.csv');

        return $response;

    }



}
