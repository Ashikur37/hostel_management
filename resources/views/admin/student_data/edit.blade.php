@extends('layouts.admin')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Student Admission Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="post" action="/edit-student-data">
        @csrf
        <input type="hidden" name="id" value="{{request()->id}}">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Student ID</label>
                <input value="{{$student->student_id}}" required name="student_id" type="text" class="form-control"
                    id="exampleInputEmail1" placeholder="Enter Student ID">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input value="{{$student->name}}" required name="name" type="text" class="form-control"
                    id="exampleInputEmail1" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input value="{{$student->batch}}" type="email" name="batch" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Gender</label>
                <input @if($student->gender=='male')
                checked
                @endif
                name="gender" type="radio" value="male" >
                Male
                <input @if($student->gender=='female')
                checked
                @endif
                name="gender" type="radio" value="female" >
                Female
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Department</label>
                <select required class="form-control" name="department" id="">
                    <option>Choose The Department</option>
                    <option @if($student->department=='CSE')
                        selected="true"
                        @endif
                        value="CSE">CSE</option>
                    <option @if($student->department=='EEE')
                        selected="true"
                        @endif

                        value="EEE">EEE</option>
                    <option @if($student->department=='BBA')
                        selected="true"
                        @endif
                        value="BBA">BBA</option>
                    <option @if($student->department=='English')
                        selected="true"
                        @endif
                        value="English">English</option>
                </select>
            </div>

          

            <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input value="{{$student->phone}}" required name="phone" type="text" class="form-control"
                    id="exampleInputEmail1" placeholder="Enter Phone NO">

            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
</div>
@endsection