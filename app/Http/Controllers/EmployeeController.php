<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function readEmployee(Request $request)
    {  
         $employees = Employee::all();

           return view('employees.validator', compact('employees'));
          // return view('demo', compact('employees'));
    }

    public function createEmployee(Request $request)
    {
            $employee = Employee::create($request->all());
            return Response::json($employee);
    }

    public function updateEmployee(Request $request, $employee_id)
    {
        $employee = Employee::find($employee_id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->sex = $request->sex;
        $employee->address = $request->address;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->department = $request->department;
        $employee->job = $request->job;
        $employee->salary = $request->salary;
        $employee->job_description = $request->job_description;
        $employee->save();
        return Response::json($employee);
    }

    public function deleteEmployee($employee_id)
    {
            // $employee = Employee::destroy($employee_id);
            // return Response::json($employee);
    }

    public function getEmployeeToEdit($employee_id)
    {
            $employee = Employee::find($employee_id);
            return Response::json($employee);
    }
}
