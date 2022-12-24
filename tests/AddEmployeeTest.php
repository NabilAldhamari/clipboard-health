<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class AddEmployeeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddingAnEmployeWithEmptyBody()
    {
        $this->withoutMiddleware(\App\Http\Middleware\AuthMiddleware::class);

        $this->post("/api/add");
        $this->seeJsonStructure(
            [
                'name',
                'salary',
                'currency',
                'department',
                'on_contract',
                'sub_department'
            ]
        );

        $this->seeStatusCode(422);
    }
}
