<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Statistics\SummaryStatistics;

class ExampleTest extends TestCase
{
    
    public function testStatisticsSummaryWithCorrectValues()
    {
        $employees = $this->getCorrectEmployeeSet();
        $summaryStatistics = new SummaryStatistics($employees);
        $ss = $summaryStatistics->getSummary();

        $this->assertEquals($ss['min'], 100);
        $this->assertEquals($ss['max'], 500);
        $this->assertEquals($ss['mean'], 300);
    }

    public function testStatisticsSummaryWithEmptyDataset()
    {
        $employees = [];
        $summaryStatistics = new SummaryStatistics($employees);
        $ss = $summaryStatistics->getSummary();

        $this->assertEquals($ss['min'], 0);
        $this->assertEquals($ss['max'], 0);
        $this->assertEquals($ss['mean'], 0);
    }

    private function getCorrectEmployeeSet(): array
    {
        return [
            ['salary' => 100],
            ['salary' => 200],
            ['salary' => 300],
            ['salary' => 400],
            ['salary' => 500]
        ];
    }
}
