@extends('layouts.superadmin')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Accountant List</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="dt" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Full Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($admins as $admin)
        <tr>
          <td>{{$admin->name}}</td>
          <td>{{$admin->email}}</td>
          <td>{{$admin->phone}}</td>
        
          <td>
            <a href="/edit-accountant?id={{$admin->id}}" class="btn btn-sm btn-success">Edit</a>
            <a href="/delete-accountant?id={{$admin->id}}" class="btn btn-danger btn-sm">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>
  </div>
  <!-- /.card-body -->
</div>

@endsection