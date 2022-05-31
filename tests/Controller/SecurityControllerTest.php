<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    public function testh1(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/inscription');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Inscription !');
    }
    // public function testclick(): void
    // {
        //     $client = static::createClient();
        //     $client->request('GET', '/inscription');
        //     $client->clickLink('Page de connexion');
        // }
    // public function testbtn() :void
    // {
    //     $client = static::createClient();
    //     $crawler = $client->request('GET', '/inscription');

    //     $link = $crawler->selectLink('Inscription !')->link();
    //     // ...
    //     // $this->assertContainsEquals($link, string $message = '');
    //     $this->assertTrue(true);
    //     // use click() if you want to click the selected link
    //     $client->click($link);
    // }
}
