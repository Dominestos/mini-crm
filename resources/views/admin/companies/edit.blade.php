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
                        <form action="{{ route('companies.update', $company->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">{{ __('Name') }}</label>
                                    <input name="name" type="text" class="form-control" id="" placeholder="{{ __('Enter name') }}" value="{{ $company->name ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="emailInput">{{ __('Email address') }}</label>
                                    <input name="email" type="email" class="form-control" id="emailInput" placeholder="{{ __('Enter email') }}" value="{{ $company->email ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="phoneField">{{ __('Mobile phone') }}</label>
                                    <input name="phone" type="tel" class="form-control" id="phoneField" placeholder="{{ __('Enter phone') }}" value="{{ $company->phone ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="websiteAddressField">{{ __('Website') }}</label>
                                    <input name="website" type="url" class="form-control" id="websiteAddressField" placeholder="{{ __('Enter website address') }}" value="{{ $company->website ?? '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="loadLogo">{{ __('Logo') }}</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="logo" type="file" class="custom-file-input" id="loadLogo" value="{{ $company->logo ?? '' }}">
                                            <label class="custom-file-label" for="loadLogo">{{ __('Choose file') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="noteField">{{ __('Note') }}</label>
                                    <textarea name="note" class="form-control" id="noteField" rows="3" placeholder="{{ __('Enter note') }}">{{ $company->note ?? '' }}</textarea>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                <a href="{{ route('companies.show', $company->id) }}" type="submit" class="btn btn-secondary">{{ __('Cancel') }}</a>
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

