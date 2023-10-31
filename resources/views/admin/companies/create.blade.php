@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Add new company') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Add new company') }}</li>
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
                            <h3 class="card-title">{{ __('Add new company') }}</h3>
                        </div>
                        <form action="{{ route('companies.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nameInput">{{ __('Name') }}</label>
                                    <input value="{{ old('name') }}" name="name" type="text" class="form-control" id="nameInput" placeholder="{{ __('Enter name') }}">
                                </div>
                                @error('name')
                                    <span id="nameInput-error" class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="emailInput">{{ __('Email address') }}</label>
                                    <input value="{{ old('email') }}" name="email"  class="form-control" id="emailInput" placeholder="{{ __('Enter email') }}">
                                </div>
                                @error('email')
                                    <span id="emailInput-error" class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="phoneField">{{ __('Mobile phone') }}</label>
                                    <input value="{{ old('phone') }}" name="phone"  class="form-control" id="phoneField" placeholder="{{ __('Enter phone') }}">
                                </div>
                                @error('phone')
                                    <span id="phoneField-error" class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="websiteAddressField">{{ __('Website') }}</label>
                                    <input value="{{ old('website') }}" name="website"  class="form-control" id="websiteAddressField" placeholder="{{ __('Enter website address') }}">
                                </div>
                                @error('website')
                                    <span id="websiteAddressField-error" class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="loadLogo">{{ __('Logo') }}</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input value="{{ old('logo') }}" name="logo" type="file" class="custom-file-input" id="loadLogo">
                                            <label class="custom-file-label" for="loadLogo">{{ __('Choose file') }}</label>
                                        </div>
                                    </div>
                                    @error('logo')
                                        <span id="loadLogo-error" class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="noteField">{{ __('Note') }}</label>
                                    <textarea name="note" class="form-control" id="noteField" rows="3" placeholder="{{ __('Enter note') }}">{{ old('note') }}</textarea>
                                    @error('note')
                                        <span id="noteField-error" class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary mx-3">{{ __('Submit') }}</button>
                                <a href="{{ route('companies.index') }}" type="submit" class="btn btn-secondary">{{ __('Cancel') }}</a>
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
