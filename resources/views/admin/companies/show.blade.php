@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
@endpush

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
                        <button id="editCompanyBtn" class="btn btn-primary mx-2">{{ __('Edit info') }}</button>
                        <button id="deleteCompanyBtn" class="btn btn-danger mx-2" data-targer="deleteCompanyModal">{{ __('Delete') }}</button>
                        <a href="{{ route('companies.index') }}" class="btn-link mx-5">{{ __('Back to the company list') }}</a>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Employees worked at this company') }}</h3>
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
                                @foreach($company->employees as $employee)
                                        <tr>
                                            <td>{{ $counter++ }}</td>
                                            <td><a href="{{ route('employees.show', $employee->id) }}" >{{ $employee->first_name }}</a></td>
                                            <td>{{ $employee->second_name }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->phone }}</td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="editCompanyFormContainer"></div>
    <div id="deleteCompanyFormContainer">
        @include('admin.companies.delete')
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
@endpush

@push('scripts')
    <script>
        $(document).ready(function () {


            $('#editCompanyBtn').click(function (e) {
                e.preventDefault();
                var id = {{ $company->id }};
                var editUrl = '{{ route('companies.edit', $company->id) }}';
                var updateUrl = '{{ route('companies.update', $company->id) }}';

                $.ajax({
                    url: editUrl,
                    type: 'GET',
                    success: function (response) {

                        $('#editCompanyFormContainer').html(response);
                        $('#editCompanyModal').modal('show');
                        bsCustomFileInput.init();

                        $('#editCompanyForm').submit(function (e) {
                            e.preventDefault();

                            var formData = new FormData(this);

                            $.ajax({
                                url: $(this).attr(updateUrl),
                                type: $(this).attr('method'),
                                dataType: 'json',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function (response) {
                                    $('#editCompanyModal').modal('hide');
                                    toastr.success(response.data.messages.update);

                                },
                                error: function (xhr, status, error) {

                                    var errors = JSON.parse(xhr.responseText).errors;

                                    $('.text-danger').text('');

                                    for (var key in errors) {
                                        if (errors.hasOwnProperty(key)) {
                                            var lastError = errors[key][errors[key].length - 1];
                                            $('[name="' + key + '"]').val('');
                                            $('#' + key + '-error_text').text(lastError);
                                        }
                                    }
                                },
                            });

                        });

                    },
                    error: function (xhr, status, error) {

                        console.error(xhr.responseText);
                    },
                });
            });

            $('#deleteCompanyBtn').click(function (e) {

                $('#deleteCompanyModal').modal('show');

            });
        });
    </script>
@endpush
