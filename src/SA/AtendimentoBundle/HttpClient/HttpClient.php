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

    private $codigo;
    private $url;
    private $search;

    public function __construct(array $config = [])
    {
        parent::__construct($config);
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

    public function setCodigo($codigo)
    {
        $this->codigo = ($codigo == '') ? '-' : $codigo;
        return $this;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }


    /**
     * @return mixed
     */
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * @param mixed $search
     * @return HttpClient
     */
    public function setSearch($search)
    {
        $this->search = $search;
        return $this;
    }

    /**
     * @return \Psr\Http\Message\StreamInterface
     */
    private function doRequest()
    {
        $response = $this->request('GET',
                                    $this->getUrl().$this->getSearch().'/'.$this->getCodigo());

        return  $response;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        if($this->doRequest()->getStatusCode() == 200) {

            $data = $this->doRequest()
                ->getBody()
                ->getContents();

            return \GuzzleHttp\json_decode($data);

        }else{
            $data = json_encode(array('error' => 'Problema ao acessar a integracao'));
            return \GuzzleHttp\json_decode($data);
        }
    }

}