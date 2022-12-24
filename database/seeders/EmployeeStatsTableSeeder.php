<?php

namespace Database\Seeders;

use App\Models\EmployeeStats;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class EmployeeStatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::disk('local')->get('dataset.json');
        $employees = json_decode($json, true);

        foreach ($employees as $employee) {
            if (!array_key_exists('on_contract', $employee)) {
                $employee['on_contract'] = 0;
            }

            EmployeeStats::query()->updateOrCreate([
                'name' => $employee['name'],
                'salary' => $employee['salary'],
                'currency' => $employee['currency'],
                'department' => $employee['department'],
                'on_contract' => $employee['on_contract'] === 'true'? 1 : 0,
                'sub_department' => $employee['sub_department'],
            ]);
        }
    }
}