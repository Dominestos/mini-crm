@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-11 m-5">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <p class="lead">{{ __('Employee info') }}</p>
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
                        <button id="editEmployeeBtn" class="btn btn-primary mx-2">{{ __('Edit info') }}</button>
                        <button id="deleteEmployeeBtn" class="btn btn-danger mx-2">{{ __('Delete') }}</button>
                        <a href="{{ route('employees.index') }}" class="btn-link mx-5">{{ __('Back to the employee list') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="editEmployeeFormContainer"></div>
    <div id="deleteEmployeeFormContainer">
        @include('admin.employees.delete')
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
@endpush

@push('scripts')
    <script>
        $(document).ready(function () {


            $('#editEmployeeBtn').click(function (e) {
                e.preventDefault();

                var id = {{ $employee->id }};
                var editUrl = '{{ route('employees.edit', $employee->id) }}';
                var updateUrl = '{{ route('employees.update', $employee->id) }}';

                $.ajax({
                    url: editUrl,
                    type: 'GET',
                    success: function (response) {

                        $('#editEmployeeFormContainer').html(response);
                        $('#editEmployeeModal').modal('show');

                        $('#editEmployeeForm').submit(function (e) {
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
                                    $('#editEmployeeModal').modal('hide');
                                    toastr.success(response.data.messages.update);

                                },
                                error: function (xhr, status, error) {

                                    var errors = JSON.parse(xhr.responseText).errors;

                                    $('.text-danger').text('');

                                    for (var key in errors) {
                                        if (errors.hasOwnProperty(key)) {
                                            var lastError = errors[key][errors[key].length - 1];
                                            $('[name="' + key + '"]').val('');
                                            $('#emp-' + key + '-error_text').text(lastError);
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

            $('#deleteEmployeeBtn').click(function (e) {

                $('#deleteEmployeeModal').modal('show');

            });
        });
    </script>
@endpush
