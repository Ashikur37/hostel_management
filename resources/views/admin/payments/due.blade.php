@extends('layouts.admin')

@section('content')
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Pending Payments</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
              <table id="dt" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Month</th>
                  <th>Year</th>
                  <th>Student Name</th>
                  <th>Student ID</th>
                
                  <th>Seat No</th>
                  <th>Room No</th>
                  <th>Rent</th>
                  <th>Due</th>
                  <th>Fine</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($payments as $payment)
                  <tr>
                  <td>{{$payment->month}}</td>
                  <td>{{$payment->year}}</td>
                    <td>{{$payment->name}}</td>
                    <td>{{$payment->student_id}}</td>
                 
                    <td>{{$payment->seat_no}}</td>
                    <td>{{$payment->room_no}}</td>
                    <td>{{$rent}}</td>
                    <td>{{$rent-$payment->amount}}</td>
                    <td>{{$payment->fine}}</td>
                   <td>
                    <button class="btn btn-outline-success" onclick="update({{$payment->id}})">
                     Upadate Fine
                    </button>
                   </td>
                  </tr>
              @endforeach
                </tbody>
              
              </table>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
<script>
update=(id)=>{
  fine=window.prompt("Enter the fine");
  if(fine&&!isNaN(fine)){
    window.location.href="/update-fine?id="+id+"&fine="+fine;
  }
}
</script>
@endsection