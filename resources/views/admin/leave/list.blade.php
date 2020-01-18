@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Notice List</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="dt" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Student Id</th>
          <th>Email</th>
          <th>Phone</th>
            <th>Room No</th>
            <th>Seat No</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($applications as $application)
        <tr>
          <td>{{$application->name}}</td>
          <td>{{$application->student_id}}</td>
          <td>{{$application->email}}</td>
          <td>{{$application->phone}}</td>
          <td>{{$application->room_no}}</td>
          <td>{{$application->seat_no}}</td>

          
          <td>
              @if ($application->status==0)
            <a href="/approve-leave?id={{$application->id}}" class="btn btn-sm btn-success">Approve</a>
            @else
            <span class="text text-success">
                Approved
            </span>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>
  </div>
  <!-- /.card-body -->
</div>

@endsection