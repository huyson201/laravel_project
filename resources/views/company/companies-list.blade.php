@extends('dashboard')
@section('main')
 <!-- MAIN -->
 <div class="col p-4">
    <h1 class="display-4">List of all companies</h1>
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
            <th scope="row">{{ $company->company_id}}</th>
            <td>{{ $company->company_name}}</td>
            <td>{{ $company->company_web}}</td>
            <td>{{ $company->company_address}}</td>
            <td>{{ $company->company_phone}}</td>
            <td>{{ $company->company_code}}</td>
            <td>
              @foreach ( $company->categories as $category)
                  <li>{{ $category->category_name}}</li> 
              @endforeach
            </td>
            <td>
                <a href="{{route('company.edit', [$company->company_id])}}" class="btn btn-success">Edit</a>
                <a href="#" class="btn btn-danger" onclick="confirm('are you sure want to delete?')">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$companies->links()}}
</div><!-- Main Col END -->
@endsection
