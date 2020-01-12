@extends('layouts.admin')

@section('content')
<div class="card">
            <div class="card-header">
              <h3 class="card-title">   Students In The Room</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="dt" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Student Id</th>
                  <th>Department</th>
                  <th>Seat No</th>
                  <th>Phone</th>
                  
                  <th>Allotment At</th>
                  <th>Leave at</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($students as $student)
                  <tr>
                    <td>{{$student->name}}</td>
                    <td>{{$student->student_id}}</td>
                    <td>{{$student->department}}</td>
                    <td>{{$student->seat_no}}</td>
                    <td>{{$student->phone}}</td>
                    <td>{{$student->updated_at}}</td>
                    <td>{{$student->leaved_at}}</td>

                    
                    <td>
                      <a href="/cancel-book?id={{$student->id}}&room={{$room}}" class="btn btn-sm btn-danger">Cancel Booking</a>
                      
                    </td>
                  </tr>
              @endforeach
                </tbody>
              
              </table>
            </div>
            <!-- /.card-body -->
          </div>

@endsection