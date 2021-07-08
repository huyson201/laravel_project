@extends('dashboard')
@if (isset($company))
    @section('main')
        <!-- MAIN -->
        <div class="col p-4">
            <h1 class="display-4">Edit Company</h1>
            <p class="text-success"> {{ session('success') }}</p>
            <main class="signup-form mt-5">
                <div class="cotainer">
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('company.custom.edit') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="company_id" value="{{ $company->company_id }}">
                                        <div class="form-group mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" placeholder="Name" id="name" class="form-control"
                                                name="company_name" value="{{ $company->company_name }}" required
                                                autofocus>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="name">Web</label>
                                            <input type="text" placeholder="Web" id="web" class="form-control"
                                                name="company_web" value="{{ $company->company_web }}" required autofocus>
                                        </div>
                                        @error('company_web')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group mb-3">
                                            <label for="address">Address</label>
                                            <input type="text" placeholder="Name" id="address" class="form-control"
                                                name="company_address" value="{{ $company->company_address }}" required
                                                autofocus>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="phone">Phone</label>
                                            <input type="text" placeholder="Name" id="phone" class="form-control"
                                                name="company_phone" value="{{ $company->company_phone }}" required
                                                autofocus>


                                        </div>
                                        @error('company_phone')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group mb-3">
                                            <label for="address">Code</label>
                                            <input type="text" placeholder="Code" id="code" class="form-control"
                                                name="company_code" value="{{ $company->company_code }}" required
                                                autofocus>
                                        </div>
                                        @error('company_code')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group mb-3">
                                            <label for="category">Category</label>
                                            {!! Form::select('category_id', $categories, $selected, ['multiple' => 'multiple', 'name' => 'categories[]', 'class' => 'form-control', 'id' => 'category', 'required']) !!}
                                        </div>
                                        <div class="d-grid mx-auto">
                                            <button type="submit" class="btn btn-dark btn-block">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div><!-- Main Col END -->
    @endsection
@else
    @section('main')
        <!-- MAIN -->
        <div class="col p-4">
            <h1 class="display-4">Add Company</h1>
            {{-- <p class="text-success"> {{ session('success') }}</p> --}}
            <main class="signup-form mt-5">
                <div class="cotainer">
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('company.custom.create') }}" method="GET">
                                        @csrf
                                        <input type="hidden" name="company_id">
                                        <div class="form-group mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" placeholder="Name..." id="name" class="form-control"
                                                name="company_name" required autofocus>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="name">Web</label>
                                            <input type="text" placeholder="Web..." id="web" class="form-control"
                                                name="company_web" required autofocus>
                                        </div>
                                        @error('company_web')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group mb-3">
                                            <label for="address">Address</label>
                                            <input type="text" placeholder="Address..." id="address" class="form-control"
                                                name="company_address" required autofocus>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="phone">Phone</label>
                                            <input type="text" placeholder="Phone..." id="phone" class="form-control"
                                                name="company_phone" required autofocus>
                                        </div>
                                        @error('company_phone')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group mb-3">
                                            <label for="address">Code</label>
                                            <input type="text" placeholder="Code..." id="code" class="form-control"
                                                name="company_code" required autofocus>
                                        </div>
                                        @error('company_code')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-group mb-3">
                                            <label for="category">Category</label>
                                            {!! Form::select('category_id', $categories, $categories, ['multiple' => 'multiple', 'name' => 'categories[]', 'class' => 'form-control', 'id' => 'category','required']) !!}
                                        </div>
                                        <div class="d-grid mx-auto">
                                            <button type="submit" class="btn btn-dark btn-block">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div><!-- Main Col END -->
    @endsection

@endif
