<?php

use App\Domain;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class DomainsControllerTest extends TestCase
{
    use DatabaseMigrations;

    protected $testUrl = ['name' => 'http://www.mail.ru'];

    public function testCreate()
    {
        $this->get(route('domains.create'));
        $this->assertEquals(200, $this->response->status());
    }

    public function testStore()
    {
        $this->post(route('domains.store'), $this->testUrl);
        
        $this->seeInDatabase('domains', $this->testUrl);
        
    }

    public function testIndex()
    {
        $this->get(route('domains.index'));

        $this->assertEquals(200, $this->response->status());

    }

    public function testShow()
    {
        $domain = factory('App\Domain')->create($this->testUrl);

        $this->get("domains/{$domain->id}");
        
        $this->assertContains('http://www.mail.ru', $this->response->getContent());

    }

}
