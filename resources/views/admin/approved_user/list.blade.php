@extends('layouts.admin')

@section('content')




<div class="card">
  <div class="card-header">
    <h3 class="card-title">Approved Applications</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="table-responsive">
      <table id="dt" class="table table-bordered table-striped">
        <thead>
          <tr>
            
            <th>Full Name</th>
            <th>Student ID</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Department</th>
            <th>Batch</th>
            <th>Father</th>
            <th>Mother</th>
            <th>Address</th>
            <th>Local Guardian</th>
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
            <td>{{$application->department}}</td>
            <td>{{$application->batch}}</td>
            <td>{{$application->father}}</td>
            <td>{{$application->mother}}</td>
            <td>{{$application->address}}</td>
            <td>{{$application->guardian}}</td>
            <td>
              <a class="btn btn-primary" href="/edit-application?id={{$application->id}}">
                Edit
              </a>
              <a href="/delete-application?id={{$application->id}}"  class="btn btn-danger btn-sm">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>

      </table>
    </div>
  </div>
  <!-- /.card-body -->
</div>
<script>
approve=(id)=>{
  document.getElementById("aid").value=id;
  $("#myModal").modal();
}
</script>
@endsection