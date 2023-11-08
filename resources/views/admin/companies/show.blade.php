@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-11 m-5">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <p class="lead">{{ __('Company info') }}</p>
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
                                <th>{{ __('Website') }}:</th>
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
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Employee list') }}</h3>
                    <button id="addEmployeeBtn" type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-lg">{{ __('Add new employee') }}</button>
                </div>
                <div class="card-body">
                    <table id="employees-table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>{{ __('First Name') }}</th>
                            <th>{{ __('Second Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Phone') }}</th>
                            <th>{{ __('Company') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($company->employees as $employee)
                            <tr class="clickable-row" data-url="{{ route('employees.show', $employee->id) }}">
                                <td >{{ $employee->id }}</td>
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->second_name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td><a href="{{ route('companies.show', $employee->company->id) }}">{{ $employee->company->name }}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>№</th>
                            <th>{{ __('First Name') }}</th>
                            <th>{{ __('Second Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Phone') }}</th>
                            <th>{{ __('Company') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="editCompanyFormContainer"></div>
    <div id="addEmployeeFormContainer"></div>
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
    <script>
        $(document).ready(function () {
            $("#employees-table").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                columnDefs: [
                    {
                        targets: [0, 5],
                        visible: false,
                    }
                ],
                "buttons": [
                    "excel",
                    "colvis",
                ],
            }).buttons().container().appendTo('#employees-table_wrapper .col-md-6:eq(0)');
            $("#employees-table").on('click', '.clickable-row', function () {
                window.location = $(this).data("url");
            });
        });
    </script>
    <script>
        $(document).ready(function () {

            var message = '{{ session('delete-message') }}';

            if (message) {
                toastr.success(message);
            }

            $('#addEmployeeBtn').click(function (e) {
                e.preventDefault();
                var button = e.target;

                $.ajax({
                    url: '{{ route('employees.create', ['companyID' => $company->id]) }}',
                    type: 'GET',
                    success: function (response) {
                        alert('ajax');
                        $('#addEmployeeFormContainer').html(response);
                        $('#addEmployeeModal').modal('show');

                        $('#addEmployeeForm').submit(function (e) {
                            e.preventDefault();

                            var formData = new FormData(this);

                            alert($(this).attr('{{ route('employees.store') }}'));

                            $.ajax({
                                url: '{{ route('employees.store') }}',
                                type: $(this).attr('method'),
                                dataType: 'json',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function (response) {

                                    $('#addEmployeeModal').modal('hide');
                                    toastr.success(response.data.messages.store);

                                },
                                error: function (xhr, status, error) {

                                    var errors = JSON.parse(xhr.responseText).errors;

                                    $('.text-danger').text('');

                                    for (var key in errors) {
                                        if (errors.hasOwnProperty(key)) {
                                            var lastError = errors[key][errors[key].length - 1];
                                            $('[name="' + key + '"]').val('');
                                            $('#' + key + '-emp_error_text').text(lastError);
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
        });
    </script>

@endpush
