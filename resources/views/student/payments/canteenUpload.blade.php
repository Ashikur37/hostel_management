@extends('layouts.student')

@section('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Upload Bank Receipt For Canteen Payment</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="/upload-canteen-receipt" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Month</label>
                        <select name="month" id="" class="form-control">
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                      </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Year</label>
                    <input required name="year" type="number" class="form-control"" placeholder="Enter the Year">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Receipt</label>
                    <input required name="receipt" type="file" class="form-control" >
                  </div>
                 
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
@endsection