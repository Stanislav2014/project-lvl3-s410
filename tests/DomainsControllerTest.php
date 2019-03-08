<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class DomainsControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function testCreate()
    {
        $this->get('/');
        $this->assertEquals(200, $this->response->status());
    }

    public function testStore()
    {
        $this->post('/domains', ['name' => 'http://mail.ru']);
        $this->post('/domains', ['name' => 'http://ya.ru']);

        $this->seeInDatabase('domains', ['name' => 'http://mail.ru']);
        $this->seeInDatabase('domains', ['name' => 'http://ya.ru']);
    }

    public function testIndex()
    {
        $this->post('/domains', ['name' => 'http://mail.ru']);
        $this->post('/domains', ['name' => 'http://ya.ru']);

        $this->get('/domains');

        $this->assertContains('http://mail.ru', $this->response->getContent());
        $this->assertContains('http://ya.ru', $this->response->getContent());

    }

    public function testShow()
    {
        $this->post('/domains', ['name' => 'http://mail.ru']);
        $this->get('/domains/1');

        $this->assertContains('http://mail.ru', $this->response->getContent());

    }

}
