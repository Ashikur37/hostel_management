@extends('layouts.admin')

@section('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Notice</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="/add-notice">
              @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input required name="title" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Details</label>
                        <textarea name="body" class="form-control" placeholder="Enter Details" id="" cols="30" rows="4"></textarea>
                      </div>


                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
@endsection