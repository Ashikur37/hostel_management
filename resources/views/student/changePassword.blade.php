@extends('layouts.student')

@section('content')
<form role="form" method="post" action="/change-password">
              @csrf
                <div class="card-body">
                    
                        <span class="text text-success" id="msg">

                            </span>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Old Password</label>
                    <input onblur="change()" id="old" required name="oldpassword" type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                  </div>
                  <span class="text text-danger" id="er">

                  </span>
                  <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input required name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                  </div>
                 
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button id="btn" disabled type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <script>
                  change=()=>{
                      let pass=document.getElementById("old").value;
                      let cpass="{{$student->password}}";
                      if(pass==cpass){
                        document.getElementById("btn").disabled=false;
                        document.getElementById("er").innerHTML="";
                      }
                      else{
                        document.getElementById("er").innerHTML="Wrong old password";
                        document.getElementById("btn").disabled=true;
                      }
                  }
                  if(window.location.href.includes('msg')){
                    alert("Password updated successfully");
                  }
              </script>
@endsection