@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
@endsection

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

@section('scripts')
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

    <script>
        $(document).ready(function () {

            $('#addCompanyBtn').click(function (e) {
                e.preventDefault();

                $.ajax({
                    url: '{{ route('companies.create') }}',
                    type: 'GET',
                    success: function (response) {

                        $('#addCompanyFormContainer').html(response);
                        $('#addCompanyModal').modal('show');

                        $('#addCompanyForm').submit(function (e) {
                            e.preventDefault();

                            var formData = new FormData(this);

                            for (var pair of formData.entries()) {
                                console.log(pair[0] + ': ' + pair[1]);
                            }

                            $.ajax({
                                url: $(this).attr('{{ route('companies.store') }}'),
                                type: $(this).attr('method'),
                                dataType: 'json',
                                data: formData,
                                // headers: {
                                //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                // },
                                processData: false,
                                contentType: false,
                                success: function (response) {

                                    console.log(response);
                                    $('#addCompanyModal').modal('hide');
                                    toastr.success('{{ __('New Company successfully added!') }}');

                                },
                                error: function (xhr, status, error) {

                                    var errors = JSON.parse(xhr.responseText).errors;

                                    for (var key in errors) {
                                        if (errors.hasOwnProperty(key)) {
                                            var lastError = errors[key][errors[key].length - 1];
                                            var errorSpan = $('<span>').addClass('text-danger').text(lastError);
                                            $('[name="' + key + '"]').val('').after(errorSpan);
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
@endsection
