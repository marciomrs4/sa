<?php

namespace SA\AtendimentoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class DefaultControllerTest extends WebTestCase
{

    private $client = null;

    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testHomeDashBoard()
    {
        $this->logIn();

        $crawler = $this->client->request('GET','/home/dashboard');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function testHome()
    {
        $this->logIn();

        $crawler = $this->client->request('GET','/home');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function testContensTextAtendimento()
    {
        $this->logIn();

        $crawler = $this->client->request('GET','/home');

        $this->assertContains('Atendimento', $this->client->getResponse()->getContent());
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
