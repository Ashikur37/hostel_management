@extends('layouts.superadmin')

@section('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Admission Officer</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="/add-admission">
              @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input required name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Full Name">
                      </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input required name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input required name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                  </div>
                  <div class="form-group">
                      <label for="exampleInputPassword1">Phone</label>
                      <input required name="phone" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Phone No">
                    </div>
                    
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
@endsection