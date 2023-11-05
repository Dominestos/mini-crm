@section('content')
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog modal-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('New employee') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addEmployeeForm" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="firstNameInput">{{ __('First Name') }}</label>
                            <input id="firstNameInput" name="first_name" class="form-control" placeholder="{{ __('Enter first name') }}" />
                            <span id="first_name-emp_error_text" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="secondNameInput">{{ __('Second Name') }}</label>
                            <input id="secondNameInput" name="second_name" class="form-control" placeholder="{{ __('Enter second name') }}" />
                            <span id="second_name-emp_error_text" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="emailInput">{{ __('Email address') }}</label>
                            <input id="emailInput" name="email" class="form-control" placeholder="{{ __('Enter email') }}" />
                            <span id="email-emp_error_text" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="phoneField">{{ __('Mobile phone') }}</label>
                            <input id="phoneField" name="phone" class="form-control" placeholder="{{ __('Enter phone') }}" />
                            <span id="phone-emp_error_text" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="noteField">{{ __('Note') }}</label>
                            <textarea id="noteField" name="note" class="form-control" rows="3" placeholder="{{ __('Enter note') }}"></textarea>
                            <span id="note-emp_error_text" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="companyInput">{{ __('Company') }}</label>
                            @if(isset($company))
                                <select name="company_id" class="form-control" id="companyInput" readonly>
                                    <option value="{{ $company->id }}" selected>{{ $company->name }}</option>
                                </select>
                            @else
                                <select name="company_id" class="form-control" id="companyInput">
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Confirm') }}</button>
                        <a href="{{ route('employees.index') }}" type="submit" class="btn btn-secondary">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

