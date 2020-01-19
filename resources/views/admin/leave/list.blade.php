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
            <th>Leave At</th>
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
          <td>{{$application->leave_at}}</td>
          
          <td>
              @if ($application->status==0)
            <a href="/approve-leave?id={{$application->id}}" class="btn btn-sm btn-success">Approve</a>
            <button onclick="unapprove('{{$application->id}}')"  class="btn btn-danger btn-sm">Unapprove</button>
            
            @elseif ($application->status==1)
            <span class="text text-success">
                Approved
            </span>
            @else
            <span class="text text-danger">
                Unapproved
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
<script>
unapprove=(id)=>{
  document.getElementById("aid").value=id;
  $("#myModal").modal();
}
</script>
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Unapprove Application</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <form role="form" method="post" action="/unapprove-leave">
              @csrf
              <div class="form-group">
                  <label for="exampleInputPassword1">Mail Body </label>
                  <textarea name="body" id="" cols="10" rows="5" class="form-control" placeholder="Mail Body"></textarea>
                </div>
                <input type="hidden" name="id" id="aid">
                <button class="btn btn-success">
                  Send Email
                </button>
              </form>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
  </div>
@endsection