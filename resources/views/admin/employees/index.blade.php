@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employee list</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Employee list</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @foreach($companies as $company)
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><a href="{{ route('companies.show', $company->id) }}">{{ $company->name }}</a></h3>
                <a href="{{ route('employees.create', ['companyID' => $company->id]) }}" class="btn btn-primary float-right">{{ __('Add new employee') }}</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>{{ __('First Name') }}</th>
                        <th>{{ __('Second Name') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Phone') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $counter = 1;
                    @endphp
                    @foreach($employees as $employee)
                        @if($employee->company->id === $company->id)
                            <tr>
                                <td>{{ $counter++ }}</td>
                                <td><a href="{{ route('employees.show', $employee->id) }}" >{{ $employee->first_name }}</a></td>
                                <td>{{ $employee->second_name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    @endforeach
@endsection
