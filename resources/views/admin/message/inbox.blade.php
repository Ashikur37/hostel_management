@extends('layouts.admin')

@section('content')




<div class="card">
  <div class="card-header">
    <h3 class="card-title">Approved Applications</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="table-responsive">
      <table id="dt" class="table table-bordered table-striped">
        <thead>
          <tr>
            
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Send At</th>
            <th>View</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($messages as $message)
          <tr>
            
            <td>{{$message->name}}</td>
            <td>{{$message->email}}</td>
            <td>{{$message->message}}</td>

            <td>{{$message->created_at}}</td>

            <td>
                <a class="btn btn-success" href="/admin-message?student={{$message->id}}">View</a>
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
approve=(id)=>{
  document.getElementById("aid").value=id;
  $("#myModal").modal();
}
</script>
@endsection