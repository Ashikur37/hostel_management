@extends('layouts.superadmin')

@section('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="/edit-admin">
              @csrf
              <input type="hidden" name="admin" value={{$admin->id}}>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input value={{$admin->name}} required name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Full Name">
                      </div>
                 
                  <div class="form-group">
                      <label for="exampleInputPassword1">Phone</label>
                      <input value={{$admin->phone}} required name="phone" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Phone No">
                    </div>
                    <div class="form-group">
                      <label for="">For Hostel</label>
                      <select name="hostel" id="" class="form-control">
                        <option
                        @if ($admin->type==8)
                          selected="true"
                        @endif
                        value="5">Admission Office</option>
                        <option
                        @if ($admin->type==5)
                          selected="true"
                        @endif
                        value="5">Boys1</option>
                        <option
                        @if ($admin->type==6)
                          selected="true"
                        @endif
                        value="6">Boys2</option>
                        <option
                        @if ($admin->type==7)
                          selected="true"
                        @endif
                        value="7">Girls</option>
                      </select>
                    </div>
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
@endsection