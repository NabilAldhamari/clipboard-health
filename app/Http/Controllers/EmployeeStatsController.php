<?php

namespace App\Http\Controllers;

use App\Models\EmployeeStats;
use Illuminate\Http\Request;
use App\Statistics\SummaryStatistics;

class EmployeeStatsController extends Controller
{

    public function addEmployee(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users|max:150',
            'salary' => 'required|integer',
            'currency' => 'required|max:4',
            'department' => 'required|max:200',
            'on_contract' => 'required|boolean',
            'sub_department' => 'required|max:200'
        ]);

        $employee = EmployeeStats::create($request->all());
        return response()->json(['created' => true, 'employee' => $employee], 201);
    }

    public function deleteEmployee($id)
    {
        EmployeeStats::findOrFail($id)->delete();
        return response()->json(['deleted' => true], 200);
    }

    public function showAllEmployees()
    {
        return response()->json(
            (new SummaryStatistics(
                EmployeeStats::all()->toArray()
            ))->getSummary()
        );
    }

    public function showContractedEmployees()
    {
        return response()->json(
            (new SummaryStatistics(
                EmployeeStats::where('on_contract', '!=', 0)->get()->toArray()
            ))->getSummary()
        );
    }

    public function showEmployeesInDepartment($department)
    {
        return response()->json(
            (new SummaryStatistics(
                EmployeeStats::where('department', '=', $department)->get()->toArray()
            ))->getSummary()
        );
    }

    public function showEmployeesInSubDepartment($department, $subdepartment)
    {
        return response()->json(
            (new SummaryStatistics(
                EmployeeStats::where('department', '=', $department)->where('sub_department', '=', $subdepartment)->get()->toArray()
            ))->getSummary()
        );
    }

}