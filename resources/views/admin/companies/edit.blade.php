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
                        <form action="{{ route('companies.update', $company->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nameInput">{{ __('Name') }}</label>
                                    <input name="name" type="text" class="form-control" id="nameInput" placeholder="{{ __('Enter name') }}" value="{{ old('name') ?? $company->name }}">
                                    @error('name')
                                    <span id="nameInput-error" class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="emailInput">{{ __('Email address') }}</label>
                                    <input name="email" type="email" class="form-control" id="emailInput" placeholder="{{ __('Enter email') }}" value="{{ old('email') ?? $company->email }}">
                                    @error('email')
                                    <span id="emailInput-error" class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phoneField">{{ __('Mobile phone') }}</label>
                                    <input name="phone" type="tel" class="form-control" id="phoneField" placeholder="{{ __('Enter phone') }}" value="{{ old('phone') ?? $company->phone }}">
                                    @error('phone')
                                    <span id="phoneFieldt-error" class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="websiteAddressField">{{ __('Website') }}</label>
                                    <input name="website" type="url" class="form-control" id="websiteAddressField" placeholder="{{ __('Enter website address') }}" value="{{ old('website') ?? $company->website }}">
                                    @error('website')
                                    <span id="websiteAddressField-error" class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="loadLogo">{{ __('Logo') }}</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="logo" type="file" class="custom-file-input" id="loadLogo">
                                            <label class="custom-file-label" for="loadLogo">{{ __('Choose file') }}</label>
                                        </div>
                                    </div>
                                    @error('logo')
                                    <span id="loadLogo-error" class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="noteField">{{ __('Note') }}</label>
                                    <textarea name="note" class="form-control" id="noteField" rows="3" placeholder="{{ __('Enter note') }}">{{ old('note') ?? $company->note }}</textarea>
                                    @error('note')
                                    <span id="noteField-error" class="text-danger">{{ $message }}</span>
                                    @enderror
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

@push('scripts')
    <script src="{{ asset('/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
@endpush

@push('scripts')
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endpush

