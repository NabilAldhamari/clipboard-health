<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class DeleteEmployeeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDeletingNonExistentEmployee()
    {
        $this->withoutMiddleware(\App\Http\Middleware\AuthMiddleware::class);

        $this->delete("/api/delete/0");
        $this->seeStatusCode(404);
    }
}
