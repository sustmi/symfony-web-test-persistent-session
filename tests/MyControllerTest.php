<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Routing\RouterInterface;

class MyControllerTest extends WebTestCase
{
    public function testFirstController(): void
    {
        $client = static::createClient();

        $client->followRedirects();

        $client->request('GET', '/my-form');

        $crawler = $client->submitForm(
            'my_form_submit',
            [
                'my_form[firstname]' => 'John',
                'my_form[lastname]' => 'Doe',
            ]
        );

        var_dump($crawler->text());

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('body', 'Hello John Doe');
    }

    public function testSecondController(): void
    {
        $client = static::createClient();

        $client->followRedirects();

        $client->request('GET', '/my-form2');

        $crawler = $client->submitForm(
            'my_form_submit',
            [
                'my_form[firstname]' => 'John',
                'my_form[lastname]' => 'Doe',
            ]
        );

        var_dump($crawler->text());

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('body', 'Hello John Doe');
    }
}
