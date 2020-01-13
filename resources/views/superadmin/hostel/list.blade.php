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
                  <th>View Students</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($rooms as $room)
                  <tr>
                    <td>{{$room->room_no}}</td>
                    <td>{{$room->total}}</td>
                    <td>{{$room->available}}</td>
                    
                    <td>
                    <a href="/view-room?id={{$room->id}}" class="btn btn-sm btn-success">View</a></td>
                    <td>
                      <a href="/edit-room?id={{$room->id}}" class="btn btn-sm btn-primary">Edit</a>
                      <a href="/delete-room?id={{$room->id}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                  </tr>
              @endforeach
                </tbody>
              
              </table>
            </div>
            <!-- /.card-body -->
          </div>

@endsection