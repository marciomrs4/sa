<?php

namespace SA\AtendimentoBundle\Tests\Controller;

use SA\AtendimentoBundle\Entity\Produto;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProdutoControllerTest extends WebTestCase
{

    public function testPraTestar()
    {
        $this->assertEquals(1,1,'Deu erro');
    }

    public function testToTest()
    {
        $produto = new Produto();

        $produto->setCodigoScodes('TP-0101');

        $this->assertEquals($produto->getCodigoScodes(),'TP-0101','Deu Erro aqui');
    }

    /*
    public function testCompleteScenario()
    {
        // Create a new client to browse the application
        $client = static::createClient();

        // Create a new entry in the database
        $crawler = $client->request('GET', '/cadastro/produto/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /cadastro/produto/");
        $crawler = $client->click($crawler->selectLink('Create a new entry')->link());

        // Fill in the form and submit it
        $form = $crawler->selectButton('Create')->form(array(
            'sa_atendimentobundle_produto[field_name]'  => 'Test',
            // ... other fields to fill
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check data in the show view
        $this->assertGreaterThan(0, $crawler->filter('td:contains("Test")')->count(), 'Missing element td:contains("Test")');

        // Edit the entity
        $crawler = $client->click($crawler->selectLink('Edit')->link());

        $form = $crawler->selectButton('Update')->form(array(
            'sa_atendimentobundle_produto[field_name]'  => 'Foo',
            // ... other fields to fill
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check the element contains an attribute with value equals "Foo"
        $this->assertGreaterThan(0, $crawler->filter('[value="Foo"]')->count(), 'Missing element [value="Foo"]');

        // Delete the entity
        $client->submit($crawler->selectButton('Delete')->form());
        $crawler = $client->followRedirect();

        // Check the entity has been delete on the list
        $this->assertNotRegExp('/Foo/', $client->getResponse()->getContent());
    }

    */
}
