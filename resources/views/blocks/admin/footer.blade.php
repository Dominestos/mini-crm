<footer class="main-footer d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-md-6 align-self-center">
                <strong>Copyright &copy; 2023 <a href="{{ route('welcome') }}">Mini CRM</a>.</strong>
                Your personal assistant.
            </div>
            <div class="col-md-6 text-right">
                <div class="nav-item dropdown d-inline-block">
                    <a class="nav-link" data-toggle="dropdown" href="#"><span class="mx-3">Language</span>
                        <i class="flag-icon flag-icon-{{ App::getLocale() === 'ru' ? 'ru' : 'gb' }}"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right p-0">
                        <a href="{{ route('lang.change', 'en') }}" class="dropdown-item active">
                            <i class="flag-icon flag-icon-gb mr-2"></i> English
                        </a>
                        <a href="{{ route('lang.change', 'ru') }}" class="dropdown-item">
                            <i class="flag-icon flag-icon-ru mr-2" data-lang="ru"></i> Russian
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

