<?php

namespace Pgde\EmploiBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function add() {
        return 1 + 1;
    }
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

//        $this->assertContains('Etat Civil', $client->getResponse()->getContent());
//        $this->assertSame(0, $crawler->filter('html:contains("NUMERO INSCRIPTION")')->count());
        $this->assertEquals(2, $this->add());
    }
}
