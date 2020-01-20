@extends('layouts.student')

@section('content')
    @foreach ($users as $user)
<div class="row">
    <div class="col-md-6">
            <div class="card card-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-success">
                      <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="/images/{{$user->image}}" alt="User Avatar">
                      </div>
                      <form action="/update-image" method="post" enctype="multipart/form-data">
                     @csrf
                        <input type="file" name="image" id="">
                      <br>
                      <button class="btn btn-info btn-sm">
                        Update
                      </button>
                      </form>
                      <!-- /.widget-user-image -->
                      <h3 class="widget-user-username">{{$user->name}}</h3>
                      <h5 class="widget-user-desc">{{$user->student_id}}</h5>
                    </div>
                    <div class="card-footer p-0">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            Department <span class="float-right badge bg-primary">{{$user->department}}</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            Batch <span class="float-right badge bg-info">{{$user->batch}}</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            Semester <span class="float-right badge bg-success">{{$user->semester}}</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            Email <span class="float-right badge bg-success">{{$user->email}}</span>
                          </a>
                        </li>
                        <li class="nav-item">
                                <a href="#" class="nav-link">
                                  Phone <span class="float-right badge bg-success">{{$user->phone}}</span>
                                </a>
                              </li>
                      </ul>
                    </div>
                  </div>
    </div>
    <div class="col-md-6">
            <div class="card card-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-primary">
                      
                      <!-- /.widget-user-image -->
                      <h3 class="">Booking Info</h3>
                      <h5 class="">
                          @if ($user->hostel==5)
                          Boys Hostel 1
                            @elseif ($user->hostel==6)
                            Boys Hostel 2
                            @else
                            Girls Hostel
                            @endif
                        </h5>
                    </div>
                    <div class="card-footer p-0">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            Room No <span class="float-right badge bg-primary">{{$user->room_no}}</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            Seat No <span class="float-right badge bg-info">{{$user->seat_no}}</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            Allotment At <span class="float-right badge bg-success">{{$user->updated_at}}</span>
                          </a>
                          @if($user->leaved_at)
                          <a href="#" class="nav-link">
                            Leaved At <span class="float-right badge bg-success">{{$user->leaved_at}}</span>
                          </a>
                          @else
                          <button  class="nav-link btn-block btn btn-danger" data-toggle="modal" data-target="#myModal">
                            Apply For Leave
                          </button>
                          @endif
                        </li>
                        
                      </ul>
                    </div>
                  </div>
    </div>
</div>

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
          <form role="form" method="post" action="/leave-application">
            @csrf
            <input type="hidden" name="aid" value="{{$user->id}}">
            <span class="text text-danger" id="er"></span>
            <div class="form-group">
                <label for="exampleInputPassword1">Leave Month </label>
                <input type="month" id="start" name="start"
       min="2018-03" value="2018-05" onblur="change()">
            </div>
              <button id="btn" disabled class="btn btn-success">
                Apply
              </button>
            </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button  type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<script>
  if(window.location.href.includes("msg")){
    alert("Leave application submitted successfully")
  }
change=()=>{
  let date=document.getElementById("start").value;
  if((new Date(date).getTime()-new Date().getTime())/ (1000*60*60*24)>30){
    document.getElementById("er").innerHTML="";
    document.getElementById("btn").disabled=false;
  }
  else{
    document.getElementById("er").innerHTML="You must apply before 30 day or more";
    document.getElementById("btn").disabled=true;

  }
}
</script>
@endforeach
@endsection