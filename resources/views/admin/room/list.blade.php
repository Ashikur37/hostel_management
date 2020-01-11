@extends('layouts.admin')

@section('content')
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Room List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="dt" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Room No</th>
                  <th>Total Seat</th>
                  <th>Available</th>
                  <th>Hostel</th>
                  <th>View Students</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($rooms as $room)
                  <tr>
                    <td>{{$room->room_no}}</td>
                    <td>{{$room->total}}</td>
                    <td>{{$room->available}}</td>
                    <td>{{$room->hostel}}</td>
                    
                    <td>
                      <a href="/view-room?id={{$room->id}}" class="btn btn-sm btn-success">View</a>
                      
                    </td>
                  </tr>
              @endforeach
                </tbody>
              
              </table>
            </div>
            <!-- /.card-body -->
          </div>

@endsection