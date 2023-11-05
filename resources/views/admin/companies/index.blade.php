@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
@endpush

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Companies list') }}</h3>
            <button id="addCompanyBtn" type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-lg">{{ __('Add new company') }}</button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>№</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Phone') }}</th>
                    <th>{{ __('Website') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)

                    <tr>
                        <td>{{ $company->id }}</td>
                        <td><a href="{{ route('companies.show', $company->id) }}">{{ $company->name }}</a></td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->phone }}</td>
                        <td>{{ $company->website }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>№</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Phone') }}</th>
                    <th>{{ __('Website') }}</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <div id="addCompanyFormContainer"></div>
@endsection

@push('scripts')
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
@endpush

@push('scripts')
    <script>
        $(document).ready(function () {

            var message = '{{ session('delete-message') }}';

            if (message) {
                toastr.success(message);
            }

            $('#addCompanyBtn').click(function (e) {
                e.preventDefault();

                $.ajax({
                    url: '{{ route('companies.create') }}',
                    type: 'GET',
                    success: function (response) {

                        $('#addCompanyFormContainer').html(response);
                        $('#addCompanyModal').modal('show');
                        bsCustomFileInput.init();

                        $('#addCompanyForm').submit(function (e) {
                            e.preventDefault();

                            var formData = new FormData(this);

                            $.ajax({
                                url: $(this).attr('{{ route('companies.store') }}'),
                                type: $(this).attr('method'),
                                dataType: 'json',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function (response) {

                                    $('#addCompanyModal').modal('hide');
                                    toastr.success(response.data.messages.store);

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
        });
    </script>
@endpush
