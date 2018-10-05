<?php

namespace SA\AtendimentoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SA\AtendimentoBundle\Form\ContatoAtendimentoReportType;

/**
 * ContatoAtendimento controller.
 *
 * @Route("/search")
 */
class ContatoAtendimentoReportController extends Controller
{
    /**
     * Lists all ContatoAtendimento entities.
     *
     * @Route("/report/contato", name="contatoatendimento_report_index")
     * @Method({"GET","POST"})
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(ContatoAtendimentoReportType::class);

        $tbAtendimentos = array();


        if($request->isMethod('POST')) {

            $telefone = $request->request->get('contato_atendimento_report');

            $contatos = $this->getDoctrine()
                ->getRepository('SAAtendimentoBundle:ContatoAtendimento')
                ->findBy(array('numeroTelefone' => $telefone['numeroTelefone']));


            foreach ($contatos as $contato) {

                $tbAtendimentos[] = $this->getDoctrine()
                    ->getRepository('SAAtendimentoBundle:TbAtendimento')
                    ->getAllAtendimentoByCodigo($contato->getAtendimentoId());

            }
        }


        return $this->render("@SAAtendimento/contatoatendimentoreport/index.html.twig",[
            'form' => $form->createView(),
            'tbAtendimentos' => $tbAtendimentos
        ]);

    }


}
