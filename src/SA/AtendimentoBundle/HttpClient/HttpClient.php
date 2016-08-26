<?php

/**
 * Created by PhpStorm.
 * User: marcio
 * Date: 28/06/16
 * Time: 11:32
 */

namespace SA\AtendimentoBundle\HttpClient;

use Symfony\Component\BrowserKit\Client;
use Symfony\Component\BrowserKit\Response;

class HttpClient extends Client
{

    protected function doRequest($request)
    {
        return new Response('');
    }
}