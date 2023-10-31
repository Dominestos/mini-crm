@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Edit company info') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Edit company info') }}</li>
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
                            <h3 class="card-title">{{ __('Edit company info') }}</h3>
                        </div>
                        <form action="{{ route('employees.update', $employee->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="firstNameInput">{{ __('First Name') }}</label>
                                    <input name="first_name" type="text" class="form-control" id="firstNameInput" placeholder="{{ __('Enter first name') }}" value="{{ old('first_name') ?? $employee->first_name ?? '' }}">
                                    @error('first_name')
                                        <span id="firstNameInput-error" class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="secondNameInput">{{ __('Second Name') }}</label>
                                    <input name="second_name" type="text" class="form-control" id="secondNameInput" placeholder="{{ __('Enter second name') }}" value="{{ old('second_name') ?? $employee->second_name ?? '' }}">
                                    @error('second_name')
                                        <span id="secondNameInput-error" class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="emailInput">{{ __('Email address') }}</label>
                                    <input name="email" type="email" class="form-control" id="emailInput" placeholder="{{ __('Enter email') }}" value="{{ old('email') ?? $employee->email ?? '' }}">
                                    @error('email')
                                        <span id="emailInput-error" class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phoneField">{{ __('Mobile phone') }}</label>
                                    <input name="phone" type="tel" class="form-control" id="phoneField" placeholder="{{ __('Enter phone') }}" value="{{ old('phone') ?? $employee->phone ?? '' }}">
                                    @error('phone')
                                        <span id="phoneField-error" class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="noteField">{{ __('Note') }}</label>
                                    <textarea name="note" class="form-control" id="noteField" rows="3" placeholder="{{ __('Enter note') }}">{{ old('note') ?? $employee->note ?? '' }}</textarea>
                                    @error('note')
                                        <span id="noteField-error" class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="companyInput">{{ __('Change company') }}</label>
                                    <select name="company_id" class="form-control" id="companyInput">
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}"
                                            @if($company->id === $employee->company->id)
                                                selected
                                            @endif>{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                <a href="{{ route('employees.show', $employee->id) }}" type="submit" class="btn btn-secondary">{{ __('Cancel') }}</a>
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

