@extends('admin.layouts.main')

@section('salaries')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h6>Salary List</h6>
                    <button class="btn btn-primary"><a href="{{route('salaries.create')}}" class="text-white" >Add New</a></button>
                </div>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Employee</th>
                            <th scope="col">Month</th>
                            <th scope="col">Year</th>
                            <th scope="col">Total Working Days</th>
                            <th scope="col">Total Leave Taken</th>
                            <th scope="col">Overtime</th>
                            <th scope="col">Salary Made</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                            use Carbon\Carbon;
                        @endphp
                        @if ($salaries)
                            @foreach ($salaries as $salary)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$salary->employee->name}}</td>
                                    <td>{{ Carbon::create()->month($salary->month)->format('F') }}</td>
                                    <td>{{$salary->year}}</td>
                                    <td>{{$salary->total_working_days}}</td>
                                    <td>{{$salary->total_leave_taken}}</td>
                                    <td>{{$salary->overtime}}</td>
                                    <td>{{$salary->total_salary_made}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('failed'))
                    <div class="alert alert-danger">
                        {{ session('failed') }}
                    </div>
                @endif
                </div>
        </div>
    </div>
</div>
@endsection
