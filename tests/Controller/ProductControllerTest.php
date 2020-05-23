<?php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductControllerTest extends WebTestCase
{
    public function testNew()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/product/new');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertGreaterThan(0,$crawler->filter('html:contains("Create new Product")')->count());
        $link = $crawler->filter('a:contains("back to list")')->eq(0)->link();
        $crawler = $client->click($link);
        $this->assertGreaterThan(0,$crawler->filter('html:contains("Product index")')->count());
        $link = $crawler->filter('a:contains("edit")')->eq(0)->link();
        $crawler = $client->click($link);
        $this->assertGreaterThan(0,$crawler->filter('html:contains("Edit Product")')->count());

        $link = $crawler->filter('a:contains("back to list")')->eq(0)->link();
        $crawler = $client->click($link);
        $this->assertGreaterThan(0,$crawler->filter('html:contains("Product index")')->count());

        $link = $crawler->filter('a:contains("show")')->eq(0)->link();
        $crawler = $client->click($link);
        $this->assertGreaterThan(0,$crawler->filter('h1:contains("Product")')->count());
        $this->assertEquals(0,$crawler->filter('h1:contains(" ")')->count());



       }
}