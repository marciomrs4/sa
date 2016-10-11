<?php

/**
 * Created by PhpStorm.
 * User: marcio
 * Date: 28/06/16
 * Time: 11:32
 */

namespace SA\AtendimentoBundle\HttpClient;

use GuzzleHttp\Client;

class HttpClient extends Client
{

    public function doRequest()
    {
        $resp = $this->request('GET',' http://200.205.202.42:8880/udtp/dyn-mvc/rest/protocolo/011251182012');

        print_r($resp->getBody());
    }
}