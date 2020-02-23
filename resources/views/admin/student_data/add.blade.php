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
                        <label for="exampleInputEmail1">Name</label>
                        <input required name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                      </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Student ID</label>
                        <input required name="student_id" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Student ID">
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
                        <label for="exampleInputEmail1">Batch</label>
       <select required class="form-control" name="batch" id="">
                                <option>Choose The Batch</option>
                                <option value="1st">1st</option>
                                <option value="2nd">2nd</option>
                                <option value="3rd">3rd</option>
                                <option value="4th">4th</option>
                                <option value="5th">5th</option>
                                    <option value="6th">6th</option>
                                    <option value="7th">7th</option>
                                    <option value="8th">8th</option>
                                    <option value="9th">9th</option>
                                    @for ($i = 10; $i <=50; $i++)
                                    <option value="{{$i}}th">{{$i}}th</option>
@endfor
                            </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Semester</label>
                      
                      <select required class="form-control" name="semester" id="">
                                    <option>Choose The Semester</option>
                                    <option value="1st">1st</option>
                                    <option value="2nd">2nd</option>
                                    <option value="3rd">3rd</option>
                                    <option value="4th">4th</option>
                                    <option value="5th">5th</option>
                                    <option value="6th">6th</option>
                                    <option value="7th">7th</option>
                                    <option value="8th">8th</option>
    
    
                                </select>
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