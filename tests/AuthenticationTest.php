<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class AuthenticationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSuccessfulAuthentication()
    {
        $this->post('/api/login', ['username' => 'nabil', 'password' => 'supersecret'])
             ->seeJsonEquals([
                'expires_in' => 0,
                'token' => '976ed9579b72d74d80c752e04df2bfee',
                'token_type' => 'bearer'
             ]);
    }

    public function testUnsuccessfulAuthentication()
    {
        $response = $this->post('/api/login', ['username' => 'nabil', 'password' => 'wrongpass']);
        $this->seeStatusCode(401);
    }

    public function testRequestWithInvalidToken()
    {
        $this->get('/api/fetch/all');
        $this->seeStatusCode(401);
    }
}
