<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        $data= compact('employees');
        return view('admin.employees.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.employees.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:employees,email',
            'mobile'=>'required',
            'address'=>'required',
            'base_salary'=>'required'
        ]);
        
        $employee= new Employee;
        $employee->name= $request['name'];
        $employee->email= $request['email'];
        $employee->mobile= $request['mobile'];
        $employee->address= $request['address'];
        $employee->base_salary= $request['base_salary'];
        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee Added successfully');
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
        $employee= Employee::find($id)->first();
        if($employee){
            $data= compact('employee');
            return view('admin.employees.edit')->with($data);
        }else{
            echo "Employee Not Found";
        }
        
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:employees,email,'.$id,
            'mobile'=>'required',
            'address'=>'required',
            'base_salary'=>'required'
        ]);
        
        $employee= Employee::find($id)->first();
        if($employee){
            $employee->name= $request['name'];
            $employee->email= $request['email'];
            $employee->mobile= $request['mobile'];
            $employee->address= $request['address'];
            $employee->base_salary= $request['base_salary'];
            $employee->save();

            return redirect()->route('employees.index')->with('success', 'Employee Update successfully');;
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Employee Not Found'
            ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee= Employee::find($id)->first();
        if($employee){
            $employee->delete();
        }

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }
}
