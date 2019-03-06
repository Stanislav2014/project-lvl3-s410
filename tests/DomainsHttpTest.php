<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class DomainsHttpTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetHome()
    {
        //$response = $this->get('/');
        //$response->assertStatus(200);

        $this->get('/');
        $this->assertEquals(200, $this->response->status());
    }

}
