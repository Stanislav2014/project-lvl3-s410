<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class DomainsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHome()
    {
        $this->get('/');

        $this->assertEquals(200, $this->response->status());
    }

    public function testDatabase()
{
    // Make call to application...
    $this->post('/domains')

    $this->seeInDatabase('domains', ['name' => 'http://ya.ru']);
}


}
