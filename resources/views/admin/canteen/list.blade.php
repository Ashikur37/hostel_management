@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Canteen List</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="dt" class="table table-bordered table-striped">
      <thead>
        <tr>
            <th>Student ID</th>
          <th>Name</th>
          <th>Department</th>
          <th>Phone</th>
          <th>Day</th>
          <th>Month</th>
          <th>Year</th>

          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($canteens as $canteen)
        <tr>
          <td>{{$canteen->student_id}}</td>
          <td>{{$canteen->name}}</td>
          <td>{{$canteen->department}}</td>
          <td>{{$canteen->phone}}</td>
          <td>{{$canteen->day}}</td>
          <td>{{$canteen->month}}</td>
          <td>{{$canteen->year}}</td>

          <td>
            <a href="/delete-canteen?id={{$canteen->id}}" class="btn btn-danger btn-sm">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>
  </div>
  <!-- /.card-body -->
</div>

@endsection