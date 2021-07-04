@extends('dashboard')
@section('main')
 <!-- MAIN -->
 <div class="col p-4">
    <h1 class="display-4">List of all trainers</h1>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Trainer Name</th>
            <th scope="col">Trainer Phone</th>
            <th scope="col">Trainer Address</th>
            <th scope="col">Company</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($trainers as $trainer)
          <tr>
            <th scope="row">{{ $trainer->trainer_id}}</th>
            <td>{{ $trainer->trainer_name}}</td>
            <td>{{ $trainer->trainer_phone}}</td>
            <td>{{ $trainer->trainer_address}}</td>
            <td>{{ $trainer->company->company_name}}</td>
            <td>
                <a href="{{route('trainer.edit', [$trainer->trainer_id])}}" class="btn btn-success">Edit</a>
                <a href="#" class="btn btn-danger" onclick="confirm('are you sure want to delete?')">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$trainers->links()}}
</div><!-- Main Col END -->
@endsection
