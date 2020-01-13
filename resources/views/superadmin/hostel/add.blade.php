@extends('layouts.admin')

@section('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Hostel</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="/add-room" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Room No</label>
                        <input required name="room" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Room No">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Total Seat</label>
                        <input required name="total" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Room No">
                      </div>
                      
                    
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
@endsection