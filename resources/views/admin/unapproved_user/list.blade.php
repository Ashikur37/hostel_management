@extends('layouts.admin')

@section('content')




<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Approve Application</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <form role="form" method="post" action="/approve-application">
            @csrf
            <div class="form-group">
                <label for="exampleInputPassword1">Room No </label>
                <select name="room" id="" class="form-control">
                @foreach ($rooms as $room)
                  <option value="{{$room->id}}">
                      {{$room->room_no}} (Available {{$room->available}}) {{$room->hostel}}
                  </option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Seat No </label>
                <input type="text" name="seat" placeholder="Seat No" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password </label>
                <input required name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
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

<div class="modal" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Reject Application</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <form role="form" method="post" action="/reject-application">
              @csrf
              <div class="form-group">
                  <label for="exampleInputPassword1">Mail Body </label>
                  <textarea name="body" id="" cols="10" rows="5" class="form-control" placeholder="Mail Body"></textarea>
                </div>
                <input type="hidden" name="id" id="aid1">
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

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Unapproved Applications</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="table-responsive">
      <table id="dt" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Image</th>
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
            <td>
              <img style="width:80px;height:80px;" src="/images/{{$application->image}}" alt="{{$application->name}}">
            </td>
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
              <button onclick="approve('{{$application->id}}')"  class="btn btn-success btn-sm">Approve</button>
              <button onclick="reject('{{$application->id}}')"  class="btn btn-danger btn-sm">Reject</button>
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
reject=(id)=>{
  document.getElementById("aid1").value=id;
  $("#myModal2").modal();
}
</script>
<script>
    if(location.href.includes("msg")){
      alert("Seat is already used")
      
      document.getElementById("aid").value=location.href.split("msg=")[1];
      setTimeout(function(){
        $("#myModal").modal();
      },1000)
    }
  </script>
@endsection