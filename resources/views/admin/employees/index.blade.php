@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employee list</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Employee list</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    @foreach($companies as $company)
        @include('components.admin.employees.table-list')
    @endforeach
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

            $('[name="addEmployeeBtn"]').click(function (e) {
                e.preventDefault();
                var button = e.target;
                // alert($(button).data('url'));

                $.ajax({
                    url: $(button).data('url'),
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
@endpush
