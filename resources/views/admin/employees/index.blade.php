@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
@endpush

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 my-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Employees list') }}</h3>
                            <button id="addEmployeeBtn" type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-lg">{{ __('Add new employee') }}</button>
                        </div>
                        <div class="card-body">
                            <table id="employees-table" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>{{ __('First name') }}</th>
                                    <th>{{ __('Second name') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Phone') }}</th>
                                    <th>{{ __('Company') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $employee)

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
                                    <th>{{ __('First name') }}</th>
                                    <th>{{ __('Second name') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Phone') }}</th>
                                    <th>{{ __('Company') }}</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <div id="addEmployeeFormContainer"></div>
@endsection

@push('scripts')
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

@endpush

@push('scripts')
    <script>
        $(document).ready(function () {

            var message = '{{ session('delete-message') }}';

            if (message) {
                toastr.success(message);
            }

            $('#addEmployeeBtn').click(function (e) {
                e.preventDefault();

                $.ajax({
                    url: '{{ route('employees.create') }}',
                    type: 'GET',
                    success: function (response) {

                        $('#addEmployeeFormContainer').html(response);
                        $('#addEmployeeModal').modal('show');

                        $('#addEmployeeForm').submit(function (e) {
                            e.preventDefault();

                            var formData = new FormData(this);

                            $.ajax({
                                url: $(this).attr('{{ route('employees.store') }}'),
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
    <script>
        $(document).ready(function () {
            $("#employees-table").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [
                    "excel",
                    "colvis"
                ],
            }).buttons().container().appendTo('#employees-table_wrapper .col-md-6:eq(0)');
            $("#employees-table").on('click', '.clickable-row', function () {
                window.location = $(this).data("url");
            });
        });
    </script>
@endpush
