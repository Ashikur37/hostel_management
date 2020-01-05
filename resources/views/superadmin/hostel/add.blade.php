@extends('layouts.superadmin')

@section('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Hostel</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="/add-hostel" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Room No</label>
                        <input required name="room" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Room No">
                      </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Building No</label>
                    <input required name="building" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Building No">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Rent</label>
                    <input required name="price" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Monthly Rent">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputPassword1">Street Address</label>
                      <input required name="location" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Street Address">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Gender</label>
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="gender" value="male">Male
                        </label>
                      </div>
                      <div class="form-check-inline">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="gender" value="female">Female
                        </label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Image</label>
                      <input required name="image" type="file" class="form-control" >
                    </div>

                    
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
@endsection