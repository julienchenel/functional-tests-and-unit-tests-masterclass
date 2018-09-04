<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 04/09/18
 * Time: 22:38
 */

namespace Tests\AppBundle;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DiaryControllerFunctionalTest extends WebTestCase
{
    public function testHomepageIsUp()
    {
        $client = static::createClient();
        $client->request('GET', '/');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
    }

    public function testHomepageContainsWelcome()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertSame(1, $crawler->filter('html:contains("Bienvenue sur FoodDiary !")')->count());
    }

    public function testHomepageContainsH1Element()
    {
        /**
         * TRAINING 2
         * En se basant sur la fonction de test ci-dessus,
         * créer un test qui permette de tester si un
         * element <H1> s'affiche effectivement dans la vue'
         */
    }

    public function testAddRecord()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/diary/add-new-record');

        $form = $crawler->selectButton('Ajouter')->form();
        $form['food[username]'] = 'John Doe';
        $form['food[entitled]'] = 'Plat de pâtes';
        $form['food[calories]'] = 600;
        $crawler = $client->submit($form);

        $client->followRedirect();

        $this->assertSame(1, $crawler->filter('div.alert.alert-success')->count());

    }


}
