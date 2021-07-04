@extends('dashboard')
@if (isset($trainer))
@section('main')
 <!-- MAIN -->
 <div class="col p-4">
    <h1 class="display-4">Edit Trainer</h1>
    <p class="text-success"> {{ session('success') }}</p>
    <main class="signup-form mt-5">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                       <div class="card-body">
                           <form action="{{route('trainer.custom.edit')}}" method="POST">
                               @csrf
                               <input type="hidden" name="trainer_id" value="{{$trainer->trainer_id}}">
                               <div class="form-group mb-3">
                                   <label for="name">Name</label>
                                   <input type="text" placeholder="Name" id="name" class="form-control" name="trainer_name" value="{{$trainer->trainer_name}}" required autofocus>
                               </div>
                               <div class="form-group mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" placeholder="Name" id="phone" class="form-control" name="trainer_phone" value="{{$trainer->trainer_phone}}" required autofocus>
                                @error('trainer_phone')
                                <p class="text-danger">{{$message}}</p>
                                @enderror

                                </div>
                                <div class="form-group mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" placeholder="Name" id="address" class="form-control" name="trainer_address" value="{{$trainer->trainer_address}}" required autofocus>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="company">Company</label>
                                    {!! Form::select('company_id', $companies, $trainer->company_id,['class' => 'form-control', 'id' => 'company']) !!}
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
    <h1 class="display-4">Add trainer</h1>
    <main class="signup-form mt-5">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                       <div class="card-body">
                           <form action="#" method="POST">
                               @csrf
                               <div class="form-group mb-3">
                                   <label for="name">Name</label>
                                   <input type="text" placeholder="Name" id="name" class="form-control" name="trainer_names"  required autofocus>
                               </div>
                               <div class="form-group mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" placeholder="Name" id="phone" class="form-control" name="trainer_phone"  required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" placeholder="Name" id="address" class="form-control" name="trainer_address" required >
                                </div>
                                <div class="form-group mb-3">
                                    <label for="company">Company</label>
                                    {!! Form::select('company_id', $companies, $companies, ['class' => 'form-control', 'id' => 'company']) !!}
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Add new</button>
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
