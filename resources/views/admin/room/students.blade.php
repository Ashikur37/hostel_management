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
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Guardian</th>
                  <th>Booked At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($students as $student)
                  <tr>
                    <td>{{$student->name}}</td>
                    <td>{{$student->student_id}}</td>
                    <td>{{$student->department}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->phone}}</td>
                    <td>{{$student->address}}</td>
                    <td>{{$student->guardian}}</td>
                    <td>{{$student->updated_at}}</td>

                    
                    <td>
                      <a href="/cancel-book?id={{$student->id}}" class="btn btn-sm btn-danger">Cancel Booking</a>
                      
                    </td>
                  </tr>
              @endforeach
                </tbody>
              
              </table>
            </div>
            <!-- /.card-body -->
          </div>

@endsection