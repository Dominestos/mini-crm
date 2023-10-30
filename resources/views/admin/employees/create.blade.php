@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('New employee') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('New employee') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('New employee') }}</h3>
                        </div>
                        <form action="{{ route('employees.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="firstNameInput">{{ __('First Name') }}</label>
                                    <input name="first_name" type="text" class="form-control" id="firstNameInput" placeholder="{{ __('Enter first name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="secondNameInput">{{ __('Second Name') }}</label>
                                    <input name="second_name" type="text" class="form-control" id="secondNameInput" placeholder="{{ __('Enter second name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="emailInput">{{ __('Email address') }}</label>
                                    <input name="email" type="email" class="form-control" id="emailInput" placeholder="{{ __('Enter email') }}">
                                </div>
                                <div class="form-group">
                                    <label for="phoneField">{{ __('Mobile phone') }}</label>
                                    <input name="phone" type="tel" class="form-control" id="phoneField" placeholder="{{ __('Enter phone') }}">
                                </div>
                                <div class="form-group">
                                    <label for="noteField">{{ __('Note') }}</label>
                                    <textarea name="note" class="form-control" id="noteField" rows="3" placeholder="{{ __('Enter note') }}"></textarea>
                                </div>
                                <div class="form-group"><label for="companyInput">{{ __('Company') }}</label>
                                    <select name="company_id" class="form-control" id="companyInput" readonly>
                                            <option value="{{ $company->id }}" selected>{{ $company->name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Confirm') }}</button>
                                <a href="{{ route('employees.index') }}" type="submit" class="btn btn-secondary">{{ __('Cancel') }}</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

