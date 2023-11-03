@section('content')
    <div id="addCompanyModal" class="modal fade">
        <div class="modal-dialog modal-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Add new company') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addCompanyForm" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nameInput">{{ __('Name') }}</label>
                            <input id="nameInput" name="name" class="form-control" placeholder="{{ __('Enter name') }}" value="{{ old('name') }}">
                            <span id="name-error_text" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="emailInput">{{ __('Email address') }}</label>
                            <input id="emailInput" name="email" class="form-control" placeholder="{{ __('Enter email') }}"/>
                            <span id="email-error_text" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="phoneField">{{ __('Mobile phone') }}</label>
                            <input id="phoneField" name="phone" class="form-control" placeholder="{{ __('Enter phone') }}"/>
                            <span id="phone-error_text" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="websiteAddressField">{{ __('Website') }}</label>
                            <input id="websiteAddressField" name="website" class="form-control" placeholder="{{ __('Enter website address') }}"/>
                            <span id="website-error_text" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="loadLogo">{{ __('Logo') }}</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <label class="custom-file-label" for="loadLogo">{{ __('Choose file') }}</label>
                                    <input id="loadLogo" type="file" name="logo" class="custom-file-input"/>
                                </div>
                            </div>
                            <span id="logo-error_text" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="noteField">{{ __('Note') }}</label>
                            <textarea id="noteField" name="note" class="form-control" rows="3" placeholder="{{ __('Enter note') }}"></textarea>
                            <span id="note-error_text" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button id="saveSubmit" type="submit" class="btn btn-primary mx-4">{{ __('Submit') }}</button>
                        <button type="button" class="btn btn-secondary mx-4" data-dismiss="modal" aria-label="Close">{{ __('Cancel') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

