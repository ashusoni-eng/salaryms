@extends('admin.layouts.main')

@section('salaries')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Add Salary</h6>
                    <form action="{{route('salaries.store')}}" method="POST" class="form-group">
                        @csrf                        
                        <div class="row">
                            <div class="col">
                                <label for="employee_id">Employee</label>
                                <select name="employee_id" class="form-control">
                                    <option value="" selected>Select Employee</option>
                                    @if ($employees)
                                        @foreach ($employees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('employee_id')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="month">Month</label>
                                <select name="month" class="form-control">
                                    <option value="" selected>Select Month</option>
                                    @if ($months)
                                        @foreach ($months as $key => $month)
                                            <option value="{{ $key }}">{{ $month }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('month')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="year">Year</label>
                                <select name="year" class="form-control">
                                    <option value="" selected>Select Year</option>
                                    @if ($years)
                                        @foreach ($years as $key => $year)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('year')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <label for="total_working_days">Total Working Days</label>
                                <input type="number" class="form-control" name="total_working_days" placeholder="Enter Total Working Days">
                                @error('total_working_days')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-4">
                                <label for="total_leave_taken">Total Leave Taken</label>
                                <input type="number" class="form-control" name="total_leave_taken" placeholder="Enter Total Leave Taken">                                
                                @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-4">
                                <label for="overtime">Over Time (in Hours.)</label>
                                <input type="number" class="form-control" name="overtime" placeholder="Enter Over Time  (in Hours.)">                                
                                @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        

                        <button type="text" class="btn btn-primary mt-3">Add</button>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
