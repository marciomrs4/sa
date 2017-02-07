<?php

namespace SA\AtendimentoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class TbAtendimentoControllerTest extends WebTestCase
{

    private $client = null;

    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testAtendimentoAnaliticoIndex()
    {
        $this->logIn();

        $crawler = $this->client->request('GET','/search/report/atendimentobymedicamento');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }


    private function logIn()
    {
        $session = $this->client->getContainer()->get('session');

        // the firewall context (defaults to the firewall name)
        $firewall = 'secured_area';

        $token = new UsernamePasswordToken('root', 'root', $firewall, array('ROLE_Técnico-ADM'));
        $session->set('_security_'.$firewall, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->client->getCookieJar()->set($cookie);
    }


}
