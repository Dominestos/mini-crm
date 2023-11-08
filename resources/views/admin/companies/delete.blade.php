<div class="modal fade" id="deleteCompanyModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Confirm delete') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ __('Do you really want to delete this company?') }}</p>
            </div>
            <div class="modal-footer justify-content-between">
                <form action="{{ route('companies.destroy', $company->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                <button type="submit" class="btn btn-danger mx-2">{{ __('Delete') }}</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Cancel') }}</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
