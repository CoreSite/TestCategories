<?php

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $client->request('GET', '/en');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $client->request('GET', '/fr');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $client->request('GET', '/en');
        $this->assertEquals('text/html; charset=UTF-8', $client->getResponse()->headers->get('Content-Type'));
    }
}