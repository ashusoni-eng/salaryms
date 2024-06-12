<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\Employee;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salaries = Salary::where('is_salary_calculated', 0)->paginate(10);
        $data= compact('salaries');
        return view('admin.salaries.index')->With($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $months = [];
        for ($i = 1; $i <= 12; $i++) {
            $months[$i] = date('F', mktime(0, 0, 0, $i, 1, date('Y')));
        }
        $currentYear = date('Y'); // Get current year
        $years = range($currentYear +1 , $currentYear- 5);
        $employees= Employee::all();
        $data= compact('employees', 'months','years');
        return view('admin.salaries.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $salary= $request->validate([
            'employee_id'=>'required',
            'month'=>'required',
            'year'=>'required',
            'total_working_days'=>'required',
            'total_leave_taken'=>'required',
            'overtime'=>'required'
        ]);
        
        $existingSalary= Salary::where('employee_id',$request['employee_id'])
                                ->where('month',$request['month'])
                                ->where('year',$request['year'])
                                ->get();
        if(!$existingSalary){
            Salary::create($salary);
            return redirect()->route('salaries.index')->with('success', 'Salary Added successfully');
        }                                        
        return redirect()->route('salaries.index')->with('failed', 'Salary Already Exist');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
