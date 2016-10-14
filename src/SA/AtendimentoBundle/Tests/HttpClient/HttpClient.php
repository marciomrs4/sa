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

    public function testDoRequest()
    {

        $httpClient = new HttpClient();

        $resp = $httpClient->request('GET','http://200.205.202.42:8880/udtp/dyn-mvc/rest/protocolo/011251182012');

        //print_r($resp->getBody());

        $this->assertEquals(200,$resp->getStatusCode());

        $content = '[
  {
    "autor": "Karine Costa Vieira Santos",
    "protocolo": "011251182012",
    "itens": [
      {
        "codigoTP": "TP-0111",
        "codigoSCODES": "1A00623/28/972/01/00",
        "descricao": "insulina / glargina - 100 UI/ml - 3 ml - refil / UNIDADE / SEM MARCA",
        "quantidade": 3
      },
      {
        "codigoTP": "TP-0118",
        "codigoSCODES": "1A00623/28/984/01/00",
        "descricao": "insulina / lispro - 100 UI/ml - 3 ml - refil / UNIDADE / SEM MARCA",
        "quantidade": 4
      }
    ]
  }
]';

        $body = (string)$resp->getBody();
        $this->assertEquals($content,$body,'Houve algum erro');
    }

    public function testStringReturn()
    {

        $httpClient = new HttpClient();

        $resp = $httpClient->request('GET','http://200.205.202.42:8880/udtp/dyn-mvc/rest/protocolo/011251182012');

        //print_r($resp->getBody());

        $this->assertEquals(200,$resp->getStatusCode());

        $content = '[
  {
    "autor": "Karine Costa Vieira Santos",
    "protocolo": "011251182012",
    "itens": [
      {
        "codigoTP": "TP-0111",
        "codigoSCODES": "1A00623/28/972/01/00",
        "descricao": "insulina / glargina - 100 UI/ml - 3 ml - refil / UNIDADE / SEM MARCA",
        "quantidade": 3
      },
      {
        "codigoTP": "TP-0118",
        "codigoSCODES": "1A00623/28/984/01/00",
        "descricao": "insulina / lispro - 100 UI/ml - 3 ml - refil / UNIDADE / SEM MARCA",
        "quantidade": 4
      }
    ]
  }
]';

        $body = (string)$resp->getBody();
        //$this->assertEquals($content,$body,'Houve algum erro');
    }
}