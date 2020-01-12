@extends('layouts.student')

@section('content')
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Pending Payments</h3>
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
                  </tr>
              @endforeach
                </tbody>
              
              </table>
            </div>
            <!-- /.card-body -->
          </div>

@endsection