<?php

/**
 * Created by PhpStorm.
 * User: marcio
 * Date: 28/06/16
 * Time: 11:32
 */

namespace SA\AtendimentoBundle\Test\HttpClient;

use SA\AtendimentoBundle\HttpClient\HttpClient;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HttpClientTest extends WebTestCase
{

    protected $httpCliente;
    protected $response;

    public function setUp()
    {
        $this->httpCliente = new HttpClient();

        $this->response = $this->httpCliente->request('GET','http://200.205.202.42:8880/udtp/dyn-mvc/rest/protocolo/011251182012');
    }


    public function testDoRequest()
    {

        $this->assertEquals(200,$this->response->getStatusCode());

    }

    /**
     * @depends testDoRequest
     */
    public function testDoRequestRedeLocal()
    {
        $response = $this->httpCliente->request('GET','http://172.17.0.13/udtp/dyn-mvc/rest/protocolo/011251182012');

        $this->assertEquals(200,$response->getStatusCode());
    }

    /**
     * @depends testDoRequest
     */
    public function testDoRequestEstoque()
    {
        $response = $this->httpCliente->request('GET','http://200.205.202.42:8880/udtp/dyn-mvc/rest/posicaoestoque/-');
        $this->assertEquals(200,$response->getStatusCode());
    }

    /**
     * @depends testDoRequest
     */
    public function testDoRequestProtocolo()
    {
        $response = $this->httpCliente->request('GET','http://200.205.202.42:8880/udtp/dyn-mvc/rest/protocolo/-');
        $this->assertEquals(200,$response->getStatusCode(),'Houve uma falha neste teste');
    }

    /**
     * @depends testDoRequest
     */
    public function testStringReturn()
    {

        $body = $this->response->getBody()->getContents();

        $this->assertNotEmpty($body,'Falha no retorno do request');

    }

    public function testValidadeMethodExists()
    {

        $this->httpCliente->setSearch('search')
                          ->setCodigo('codigo')
                          ->setUrl('url');

        $this->assertEquals($this->httpCliente->getSearch(),'search','Erro no metodo');

        $this->assertEquals($this->httpCliente->getCodigo(),'codigo','Erro no metodo');

        $this->assertEquals($this->httpCliente->getUrl(),'url','Erro no metodo');

    }
}