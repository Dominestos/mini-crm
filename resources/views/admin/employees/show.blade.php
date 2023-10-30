@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-11 m-5">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <p class="lead">{{ $employee->name }}</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr style="border-top:transparent">
                                <th style="width:40%">{{ __('First Name') }}:</th>
                                <td>{{ $employee->first_name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Second Name') }}:</th>
                                <td>{{ $employee->second_name }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ $employee->email }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Phone') }}:</th>
                                <td>{{ $employee->phone }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Note') }}:</th>
                                <td>{{ $employee->note }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Company') }}:</th>
                                <td>
                                    <a href="{{ route('companies.show', $employee->company->id) }}">{{ $employee->company->name }}</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('employees.edit', [$employee->id]) }}"
                               class="btn btn-primary mx-2">{{ __('Edit info') }}</a>
                            <button type="submit" class="btn btn-danger mx-2">{{ __('Delete') }}</button>
                            <a href="{{ route('employees.index') }}" class="btn-link mx-5">{{ __('Back to the employee list') }}</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
