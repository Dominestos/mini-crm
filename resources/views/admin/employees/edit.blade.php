@section('content')
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog modal-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Edit employee') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editEmployeeForm" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="firstNameInput">{{ __('First Name') }}</label>
                            <input id="firstNameInput" name="first_name" class="form-control" placeholder="{{ __('Enter first name') }}" value="{{ old('first_name') ?? $employee->first_name }}" />
                            <span id="emp-first_name-error_text" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="secondNameInput">{{ __('Second Name') }}</label>
                            <input id="secondNameInput" name="second_name" class="form-control" placeholder="{{ __('Enter second name') }}" value="{{ old('second_name') ?? $employee->second_name }}" />
                            <span id="emp-second_name-error_text" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="emailInput">{{ __('Email address') }}</label>
                            <input id="emailInput" name="email" class="form-control" placeholder="{{ __('Enter email') }}" value="{{ old('email') ?? $employee->email }}" />
                            <span id="emp-email-error_text" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="phoneField">{{ __('Mobile phone') }}</label>
                            <input id="phoneField" name="phone" class="form-control" placeholder="{{ __('Enter phone') }}" value="{{ old('phone') ?? $employee->phone }}" />
                            <span id="emp-phone-error_text" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="noteField">{{ __('Note') }}</label>
                            <textarea id="noteField" name="note" class="form-control" rows="3" placeholder="{{ __('Enter note') }}">{{ old('note') ?? $employee->note }}</textarea>
                            <span id="emp-note-error_text" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="companyInput">{{ __('Change company') }}</label>
                            <select name="company_id" class="form-control" id="companyInput">
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}"
                                            @if($company->id === $employee->company->id)
                                                selected
                                        @endif>{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Confirm') }}</button>
                        <button type="button" class="btn btn-secondary mx-4" data-dismiss="modal" aria-label="Close">{{ __('Cancel') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



