@extends('layouts.admin')

@section('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Canteen</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="/add-canteen">
              @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Student ID</label>
                        <input required name="student_id" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter ID">
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input required name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Department</label>
                         <select required class="form-control" name="department" id="">
                                <option>Choose The Department</option>
                                <option value="CSE">CSE</option>
                                <option value="EEE">EEE</option>
                                <option value="BBA">BBA</option>
                                <option value="English">English</option>
                            </select>
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input required name="phone" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone">
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Day</label>
                        <input required name="day" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Day">
                      </div>
                      
                      


                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
@endsection