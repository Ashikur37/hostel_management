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
                            @elseif ($user->hostel==5)
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
                            Admitted At <span class="float-right badge bg-success">{{$user->updated_at}}</span>
                          </a>
                        </li>
                        
                      </ul>
                    </div>
                  </div>
    </div>
</div>
@endforeach
@endsection