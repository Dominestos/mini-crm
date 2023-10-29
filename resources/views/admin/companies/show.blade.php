@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-11 m-5">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <p class="lead">{{ $company->name }}</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th style="width:40%">{{ __('Name') }}:</th>
                                <td>{{ $company->name }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ $company->email }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Phone') }}:</th>
                                <td>{{ $company->phone }}</td>
                            </tr>
                            <tr>
                                <th>T{{ __('Website') }}:</th>
                                <td>{{ $company->website }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Logo') }}:</th>
                                <td>{{ $company->logo }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Note') }}:</th>
                                <td>{{ $company->note }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('companies.destroy', $company->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('companies.edit', [$company->id]) }}"
                               class="btn btn-primary mx-2">{{ __('Edit info') }}</a>
                            <button type="submit" class="btn btn-danger mx-2">{{ __('Delete') }}</button>
                            <a href="{{ route('companies.index') }}" class="btn-link mx-5">{{ __('Back') }}</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
