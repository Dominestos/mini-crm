<div class="card mt-2">
    <div class="card-header">
        <h3 class="card-title"><a href="{{ route('companies.show', $company->id) }}">{{ $company->name }}:  </a>{{ __('Employee list') }}</h3>
        <button  name="addEmployeeBtn" data-id="{{ $company->id }}" data-url="{{ route('employees.create', ['companyID' => $company->id]) }}" class="btn btn-primary float-right">{{ __('Add new employee') }}</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>№</th>
                <th>{{ __('First Name') }}</th>
                <th>{{ __('Second Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Phone') }}</th>
            </tr>
            </thead>
            <tbody>
            @php
                $counter = 1;
            @endphp
            @foreach($company->employees as $employee)
                <tr>
                    <td>{{ $counter++ }}</td>
                    <td><a href="{{ route('employees.show', $employee->id) }}" >{{ $employee->first_name }}</a></td>
                    <td>{{ $employee->second_name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
