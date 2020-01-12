@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                Supervisor Signature
            </div>
            <div class="card-body">
                <img style="width:200px;height:150px" src="images/supervisor.jpg" alt="">
            </div>
            <div class="card-footer">
                <form action="/supervisor" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                            <label for="exampleInputPassword1">Update Signature </label>
                            <input type="file" class="form-control" name="image" required>
                            <br>
                            <button class="btn btn-info">
                                Update
                            </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                Registrar Signature
            </div>
            <div class="card-body">
                    <img style="width:200px;height:150px" src="images/registrar.jpg" alt="">
            </div>
            <div class="card-footer">
                    <form action="/registrar" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                                <label for="exampleInputPassword1">Update Signature </label>
                                <input type="file" class="form-control" name="image" required>
                                <br>
                                <button class="btn btn-primary">
                                    Update
                                </button>
                        </div>
                    </form>
            </div>
        </div>
        
    </div>
</div>
@endsection