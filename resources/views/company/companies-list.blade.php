@extends('dashboard')
@section('main')
    <!-- MAIN -->
    <div class="col p-4">
        <div class="row">
            <div class="col-md-6">
                <h1 class="display-4">List of all companies</h1>
            </div>
            <div class="col-md-6 d-flex  align-items-center justify-content-center">
                <form action="" method="get" style="margin-bottom: 0;">
                    <div class="d-flex">
                        {!! Form::select('category_id', $categories->prepend('All Categories'), (int) request()->input('category_id'), ['class' => 'form-control', 'id' => 'category']) !!}
                        <input type="text" name="k" id="" class="form-control" placeholder="Enter your search key..."
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
        @if (count($companies)>0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">
                        <div class="d-flex">
                            <span>ID&nbsp;</span>
                            @if (Request::query('sort') == 'company_id' && Request::query('sort_type') == 'asc')
                                <a class="sort" href="javascript:sort('company_id','desc')">
                                    <i class="fa fa-sort-down"></i>
                                </a>
                            @elseif(Request::query('sort')=='company_id' && Request::query('sort_type')=='desc')
                                <a class="sort" href="javascript:sort('company_id','asc')">
                                    <i class="fa fa-sort-up"></i>
                                </a>
                            @else
                                <a class="sort" href="javascript:sort('company_id','asc')">
                                    <i class="fa fa-sort"></i>
                                </a>
                            @endif
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex">
                            <span>Company&nbsp;</span>
                            <span>Name&nbsp;</span>
                            @if (Request::query('sort') == 'company_name' && Request::query('sort_type') == 'asc')
                                <a class="sort" href="javascript:sort('company_name','desc')">
                                    <i class="fa fa-sort-down"></i>
                                </a>
                            @elseif(Request::query('sort')=='company_name' && Request::query('sort_type')=='desc')
                                <a class="sort" href="javascript:sort('company_name','asc')">
                                    <i class="fa fa-sort-up"></i>
                                </a>
                            @else
                                <a class="sort" href="javascript:sort('company_name','asc')">
                                    <i class="fa fa-sort"></i>
                                </a>
                            @endif
                        </div>
                    </th>
                    <th scope="col">Company Web</th>
                    <th scope="col">Company Address</th>
                    <th scope="col" style="width: 15%;">Company Phone</th>
                    <th scope="col">Company Code</th>
                    <th scope="col">Categories</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
             
                @foreach ($companies as $company)
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
                        <a style="margin-bottom: 5px" href="{{ route('company.edit', [$company->company_id]) }}" class="btn btn-success">&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>
                        <a href="{{ route('company.delete', [$company->company_id]) }}" class="btn btn-danger"
                            onclick="return confirm('Are you sure want to delete [{{ $company->company_name }}] ?')">Delete</a>
                    </td>
                </tr>
                 @endforeach
              
              
            </tbody>
        </table>
        @else
        <tr>
            <h2>Not found</h2>
        </tr>
        @endif
        {{ $companies->withQueryString()->links() }}
    </div><!-- Main Col END -->
@endsection
@section('javascript')
    <script type="text/javascript">
        var query = <?php echo json_encode((object) Request::only(['category_id', 'k', 'sort', 'sort_type'])); ?>;
        console.log(query);

        function sort(name, type) {
            Object.assign(query, {
                'sort': name
            });
            Object.assign(query, {
                'sort_type': type
            });
            window.location.href = "{{ route('company.list') }}?" + $.param(query);
        }
    </script>
@endsection
