@extends('layouts.student')

@section('content')
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Payment History</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="dt" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Month</th>
                  <th>Year</th>
                  <th>Uploaded at</th>
                  <th>Approved At</th>
                  <th>Bank Receipt</th>
                  <th>Status</th>
                  <th>Rent</th>
                  <th>Due</th>
                  <th>Paid</th>
                  <th>Fine</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($payments as $payment)
                  <tr>
                    <td>{{$payment->month}}</td>
                    <td>{{$payment->year}}</td>
                    <td>{{$payment->created_at}}</td>
                    <td>{{$payment->updated_at}}</td>
                    
                    <td>
                        <a href="/images/{{$payment->receipt}}" target="_blank">
                        <img style="width:200px;max-height:200px" src="/images/{{$payment->receipt}}"/></a>
                        
                    </td>
                    
                    <td>
                    @if ($payment->status === 0)
        <span class="text text-danger">
            Pending
        </span>
@else
<span class="text text-success">
            Approved
        </span>
@endif
                    </td>
                    <td>{{$rent}}</td>
                    <td>{{$rent-$payment->amount}}</td>
                    <td>
                    {{$rent-$rent-$payment->amount}}
                    </td>
                    <td>{{$payment->fine}}</td>
                  </tr>
              @endforeach
                </tbody>
              
              </table>
            </div>
            <!-- /.card-body -->
          </div>

@endsection