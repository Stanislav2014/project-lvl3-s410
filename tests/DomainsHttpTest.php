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
    public function testRouteDomainsCreate()
    {
        $this->get('/');
        $this->assertEquals(200, $this->response->status());
    }

    //public function testRouteDomainsIndex()
    //{
    //    $this->get('/domains');
    //    $this->assertEquals(200, $this->response->status());
    //}

}
