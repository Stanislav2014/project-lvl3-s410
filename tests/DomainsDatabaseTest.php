<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class DomainsDatabaseTest extends TestCase
{
    use DatabaseMigrations;

    public function testDatabase()
    {
        
        $this->post('/domains', ['name' => 'http://mail.ru']);

        $this->seeInDatabase('domains', ['name' => 'http://mail.ru']);
    }   

}
