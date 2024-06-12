@extends('admin.layouts.main')

@section('employees')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Edit Employee</h6>
                    <form action="{{route('employees.update', $employee->id)}}" method="POST" class="form-group">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Employee Name"
                                value="{{$employee->name}}">
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter Email"
                                value="{{$employee->email}}">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="mobile">Mobile</label>
                                <input type="number" class="form-control" name="mobile" placeholder="Enter Mobile"
                                value="{{$employee->mobile}}">
                                @error('mobile')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="address">Address</label>
                                <textarea type="text" class="form-control" name="address" placeholder="Enter Address">{{$employee->address}}
                                </textarea>
                                @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="base_salary">Base Salary</label>
                                <input type="number" class="form-control" name="base_salary" placeholder="Enter Base Salary" 
                                value="{{$employee->base_salary}}"/>  
                                @error('base_salary')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror                              
                            </div>
                        </div>

                        <button type="text" class="btn btn-primary btn-sm mt-3">Update</button>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
