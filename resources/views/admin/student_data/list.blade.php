@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Student Admission Data</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="dt" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Student ID</th>
        <th>Name</th>
          <th>Email</th>
        <th>Gender</th>
          <th>Department</th>
       
          <th>Phone</th>

          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($datas as $data)
        <tr>
          <td>{{$data->student_id}}</td>
            <td>{{$data->name}}</td>
          <td>{{$data->batch}}</td>
            <td>{{$data->gender}}</td>
          <td>{{$data->department}}</td>
       
          <td>{{$data->phone}}</td>

          
          <td>
            <a href="/delete-student-data?id={{$data->id}}" class="btn btn-danger btn-sm">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>
  </div>
  <!-- /.card-body -->
</div>

@endsection