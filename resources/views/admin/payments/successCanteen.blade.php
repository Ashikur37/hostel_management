@extends('layouts.admin')

@section('content')
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Canteen Payment History</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="dt" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Hostel</th>

                <th>Month</th>
                  <th>Year</th>
                  <th>Student Name</th>
                  <th>Student ID</th>
           
                  <th>Seat No</th>
                  <th>Room No</th>
                  <th>Uploaded at</th>
                  <th>Bank Receipt</th>
                  <th>Approve</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($payments as $payment)
                  <tr>
                   <td>
                  {{["Boys1","Boys2","Girls"][$payment->hostel-5]}}
                  </td>
                  <td>{{$payment->month}}</td>
                  <td>{{$payment->year}}</td>
                    <td>{{$payment->name}}</td>
                    <td>{{$payment->student_id}}</td>
                  
                    <td>{{$payment->seat_no}}</td>
                    <td>{{$payment->room_no}}</td>
                    <td>{{$payment->created_at}}</td>
                    <td>
                        <a href="/images/{{$payment->receipt}}" target="_blank">
                        <img style="width:200px;max-height:200px" src="/images/{{$payment->receipt}}"/></a>
                        
                    </td>
                    
                    <td>
                      <a href="#" class="btn btn-sm btn-danger">Delete</a>
                      
                    </td>
                  </tr>
              @endforeach
                </tbody>
              
              </table>
            </div>
            <!-- /.card-body -->
          </div>

@endsection