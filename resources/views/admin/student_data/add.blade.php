@extends('layouts.admin')

@section('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Student Admission Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="/add-student-data">
              @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Student ID</label>
                        <input required name="student_id" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Student ID">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input required name="phone" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone NO">

                      </div>


                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
@endsection