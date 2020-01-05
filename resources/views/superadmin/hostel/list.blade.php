@extends('layouts.superadmin')

@section('content')
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Hostel List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="dt" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Room No</th>
                  <th>Building No</th>
                  <th>Gender</th>
                  <th>Rent</th>
                  <th>Street Address</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($hostels as $hostel)
                  <tr>
                    <td>{{$hostel->room_no}}</td>
                    <td>{{$hostel->building_no}}</td>
                    <td>{{$hostel->gender}}</td>
                    <td>{{$hostel->price}}</td>
                    <td>{{$hostel->location}}</td>
                    <td><img src="images/{{$hostel->image}}" alt="" style="width:90px;"></td>
                    <td>
                      <a href="/edit-hostel?id={{$hostel->id}}" class="btn btn-sm btn-success">Edit</a>
                      <a href="/delete-hostel?id={{$hostel->id}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                  </tr>
              @endforeach
                </tbody>
              
              </table>
            </div>
            <!-- /.card-body -->
          </div>

@endsection