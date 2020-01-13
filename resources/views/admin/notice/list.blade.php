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
          <th>Title</th>
          <th>Details</th>
          <th>Published At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($notices as $notice)
        <tr>
          <td>{{$notice->title}}</td>
          <td>{{$notice->body}}</td>
          <td>{{$notice->created_at}}</td>
          
          <td>
            <a href="/edit-notice?id={{$notice->id}}" class="btn btn-sm btn-success">Edit</a>
            <a href="/delete-notice?id={{$notice->id}}" class="btn btn-danger btn-sm">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>

    </table>
  </div>
  <!-- /.card-body -->
</div>

@endsection