@extends('dashboard')
@section('main')
    <!-- MAIN -->
    <div class="col p-4">

        <div class="row">
            <div class="col-md-6">
                <h1 class="display-4">Company Detail</h1>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Company ID</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Company Web</th>
                        <th scope="col">Company Address</th>
                        <th scope="col">Company Phone</th>
                        <th scope="col">Company Code</th>
                        <th scope="col">Categories</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <th scope="row" style="text-align: center">{{ $company->company_id }}</th>
                        <td>{{ $company->company_name }}</td>
                        <td>{{ $company->company_web }}</td>
                        <td>{{ $company->company_address }}</td>
                        <td>{{ $company->company_phone }}</td>
                        <td>{{ $company->company_code }}</td>
                        <td>
                            @foreach ($company->categories as $category)
                                <span>- {{ $category->category_name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a style="margin-bottom: 5px" href="{{ route('company.edit', [$company->company_id]) }}"
                                class="btn btn-success">&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>
                            <a href="{{ route('company.delete', [$company->company_id]) }}" class="btn btn-danger"
                                onclick="return confirm('Are you sure want to delete [{{ $company->company_name }}] ?')">Delete</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div><!-- Main Col END -->
    @endsection
