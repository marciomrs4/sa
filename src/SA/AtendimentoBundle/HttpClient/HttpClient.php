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

    private $protocolo;
    private $url;
    private $uri;

    public function __construct(array $config, array $rest = array())
    {
        parent::__construct($config);

        $this->setProtocolo($rest['protocolo'])
             ->setUri($rest['uri'])
             ->setUrl($rest['url']);

    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     * @return HttpClient
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    public function setProtocolo($protocolo)
    {
        $this->protocolo = ($protocolo == '') ? '-' : $protocolo;
        return $this;
    }

    public function getProtocolo()
    {
        return $this->protocolo;
    }


    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param mixed $uri
     * @return HttpClient
     */
    public function setUri($uri)
    {
        $this->uri = $uri;
        return $this;
    }

    private function doRequest()
    {
        $resp = $this->request('GET',$this->getUrl().$this->getUri().'/'.$this->getProtocolo());

        return  $resp->getBody();
    }

    public function getData()
    {
        $file =  $this->doRequest()->getContents();

        return \GuzzleHttp\json_decode($file);

    }

}