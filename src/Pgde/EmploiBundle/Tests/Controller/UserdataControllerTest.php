<?php

namespace Pgde\EmploiBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserdataControllerTest extends WebTestCase
{

    public function testCompleteScenario()
    {
    }

    public function testupdateuserdataform() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/new');

        $form = $crawler->selectButton('Soumettre')->form();
        $form['pgde_emploibundle_userdata[experiences]'] = 'test form';
        $crawler = $client->submit($form);

        echo $client->getResponse()->getContent();
    }
}
