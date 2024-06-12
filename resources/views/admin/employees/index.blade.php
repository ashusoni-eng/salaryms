@extends('admin.layouts.main')

@section('employees')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h6>Employee List</h6>
                    <button class="btn btn-primary"><a href="{{route('employees.create')}}" class="text-white">Add New</a></button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Address</th>
                            <th scope="col">Base Salary</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @if ($employees)
                            @foreach ($employees as $employee)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->mobile}}</td>
                                    <td>{{$employee->address}}</td>
                                    <td>{{$employee->base_salary}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{route('employees.edit', $employee->id)}}">Edit</a>

                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
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
            </div>
        </div>
    </div>
</div>
@endsection
