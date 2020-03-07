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
                  <th>Student ID</th>
                  <th>Student Name</th>
                  <th>Department</th>
                  <th>Month</th>
                  <th>Day</th>
                  <th>Year</th>
                  
                  <th>Uploaded at</th>
                  <th>Bank Receipt</th>
                  <th>Approve</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($payments as $payment)
                  <tr>
                  
                    <td>{{$payment->name}}</td>
                    <td>{{$payment->student_id}}</td>
                    <td>{{$payment->department}}</td>

                  <td>{{$payment->month}}</td>
                  <td>{{$payment->day}}</td>

                  <td>{{$payment->year}}</td>
                 
                    
                    <td>{{$payment->created_at}}</td>
                    <td>
                        <a href="/images/{{$payment->receipt}}" target="_blank">
                        <img style="width:200px;max-height:200px" src="/images/{{$payment->receipt}}"/></a>
                        
                    </td>
                    
                    <td>
                      <a href="/approve-payment-canteen?id={{$payment->id}}" class="btn btn-sm btn-success">Approve</a>
                      
                    </td>
                  </tr>
              @endforeach
                </tbody>
              
              </table>
            </div>
            <!-- /.card-body -->
          </div>

@endsection