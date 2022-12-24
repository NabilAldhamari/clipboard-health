<?php
namespace App\Statistics;
use App\Models\EmployeeStats;
use App\Models\User;

class SummaryStatistics {
    private array $dataset;
    private array $salaries = [];

    public function __construct(array $dataset) {
        $this->dataset = $dataset;
        $this->extractSalary();
    }

    private function extractSalary() {
        foreach($this->dataset as $set) {
            $this->salaries[] = $set['salary'];
        }
    }

    public function getSummary(): array
    {
        return [
            'mean' => $this->getMean(),
            'min' => $this->getMin(),
            'max' => $this->getMax()
        ];
    }

    private function getMean(): int
    {
        if (count($this->salaries) > 0) {
            return array_sum($this->salaries) / count($this->salaries);
        }

        return 0;
    }

    private function getMin(): int
    {
        return count($this->salaries) > 0 
        ? min($this->salaries)
        : 0;
    }

    private function getMax(): int
    {
        return count($this->salaries) > 0 
        ? max($this->salaries)
        : 0;
    }
}
?>