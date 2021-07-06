@extends('dashboard')
@section('main')
    <!-- MAIN -->
    <div class="col p-4">
        <div class="row">
            <div class="col-md-6">
                <h1 class="display-4">List of all companies</h1>
            </div>
            
            <div class="col-md-6 d-flex  align-items-center justify-content-center">
             
                <form action="{{ route('company.search') }}" method="get" style="margin-bottom: 0; width:80%;">
                    <div class="d-flex">
                  {!! Form::select('category_id', $categories, (int)request()->input('category_id'), ['class' => 'form-control', 'id' => 'category']) !!}
                        <input  type="text" name="k" id="" class="form-control" placeholder="Enter your search key..."
                            value="{{ request()->input('k') }}">
                        <button type="submit" class="btn btn-primary">
                          <i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="message">
            <div class="text-success delete mb-3">{{ session('message') }}</div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
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
                @foreach ($companies as $company)
                    <tr>
                        <th scope="row">{{ $company->company_id }}</th>
                        <td>{{ $company->company_name }}</td>
                        <td>{{ $company->company_web }}</td>
                        <td>{{ $company->company_address }}</td>
                        <td>{{ $company->company_phone }}</td>
                        <td>{{ $company->company_code }}</td>
                        <td>
                            @foreach ($company->categories as $category)
                                <li>{{ $category->category_name }}</li>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('company.edit', [$company->company_id]) }}" class="btn btn-success">Edit</a>
                            <a href="{{ route('company.delete', [$company->company_id]) }}" class="btn btn-danger"
                                onclick="confirm('Are you sure want to delete [{{ $company->company_name }}] ?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $companies->links() }}
    </div><!-- Main Col END -->
@endsection
