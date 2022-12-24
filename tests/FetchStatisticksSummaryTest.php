<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class FetchStatisticksSummaryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFetchingAllEmployees()
    {
        $this->withoutMiddleware(\App\Http\Middleware\AuthMiddleware::class);

        $this->get('/api/fetch/all');
        $this->seeJsonStructure(
            [
                'min',
                'max',
                'mean'
            ]
        );
        
        $this->seeStatusCode(200);
    }

    public function testFetchingContractedEmployees()
    {
        $this->withoutMiddleware(\App\Http\Middleware\AuthMiddleware::class);

        $this->get('/api/fetch/contracted');
        $this->seeJsonStructure(
            [
                'min',
                'max',
                'mean'
            ]
        );
        
        $this->seeStatusCode(200);
    }

    public function testFetchingDepartmentEmployees()
    {
        $this->withoutMiddleware(\App\Http\Middleware\AuthMiddleware::class);

        $this->get('/api/fetch/department/Banking');
        $this->seeJsonStructure(
            [
                'min',
                'max',
                'mean'
            ]
        );
        
        $this->seeStatusCode(200);
    }

    public function testFetchingSubdepartmentEmployees()
    {
        $this->withoutMiddleware(\App\Http\Middleware\AuthMiddleware::class);

        $this->get('/api/fetch/department/Banking/Loan');
        $this->seeJsonStructure(
            [
                'min',
                'max',
                'mean'
            ]
        );
        
        $this->seeStatusCode(200);
    }

    public function testFetchNonExistingList()
    {
        $this->withoutMiddleware(\App\Http\Middleware\AuthMiddleware::class);
        $this->get('/api/fetch/non_existing');
        $this->seeStatusCode(404);
    }
}
