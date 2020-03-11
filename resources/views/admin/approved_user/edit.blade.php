@extends('layouts.admin')

@section('content')




<div class="card">
  <div class="card-header">
    <h3 class="card-title">Edit Application</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
            <form role="form" method="post" action="/edit-application">
            @csrf
            <input type="hidden" name="id" value="{{$a->id}}">
            <div class="form-group">
                <label for="exampleInputPassword1">Room No </label>
                <select name="room" id="" class="form-control">
                @foreach ($rooms as $room)
                  <option
                  @if($room->id==$a->room_id)
                    selected="true"
                   @endif
                   value="{{$room->id}}">
                      {{$room->room_no}} (Available {{$room->available}}) {{$room->hostel}}
                  </option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Seat No </label>
                <input value="{{$a->seat_no}}" type="text" name="seat" placeholder="Seat No" class="form-control">
            </div>
          
              <input type="hidden" name="id" id="aid" value="{{$a->id}}">
              <button class="btn btn-success">
                Update
              </button>
            </form>
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