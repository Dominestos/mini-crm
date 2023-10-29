<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <h2 class="nav-header">ADMIN MENU</h2>
        <li class="nav-item">
            <a href="{{ route('companies.index') }}" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                    Companies
                    <span class="badge badge-info right">{{ isset($companies) ? $companies->count() : '' }}</span>
                </p>
            </a>
        </li>
    </ul>
</nav>
