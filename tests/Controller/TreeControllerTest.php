<?php
/**
 * Created by cudev.loc.
 * @author: Dmitriy Shuba <sda@sda.in.ua>
 * @link: http://maxi-soft.net/ Maxi-Soft
 * Date Time: 12.04.2018 13:05
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TreeControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $client->request('GET', '/api/en/tree');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $client->request('GET', '/api/fr/tree');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $client->request('GET', '/api/en/tree');
        $this->assertEquals('application/json', $client->getResponse()->headers->get('Content-Type'));
    }
}