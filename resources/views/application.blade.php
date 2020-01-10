<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hostel &mdash; Management</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition register-page">
    <div class="register-box" style="width: 460px;">
        <div class="register-logo">
            <a href="/"><b>Hostel</b>Management System</a>
        </div>
        <center>
                <div style="color: green; font-weight:bold ;" id="msg">
          
                </div>
              </center>
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Apply for Seat</p>

                <form action="/apply" method="post">
                    @csrf
                    

                    <div class="input-group mb-3">
                        <input required type="text" class="form-control" name="name" placeholder="Full name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input required type="text" class="form-control" name="student_id" placeholder="Student ID">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">

                            <select required class="form-control" name="department" id="">
                                <option>Choose The Department</option>
                                <option value="CSE">CSE</option>
                                <option value="EEE">EEE</option>
                                <option value="BBA">BBA</option>
                                <option value="English">English</option>
                            </select>
    
                        </div>
                        <div class="input-group mb-3">
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
                            </select>
                        </div>
                        <div class="input-group mb-3">
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
                    <div class="input-group mb-3">
                        <input required type="email" class="form-control" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input required type="text" class="form-control" name="phone" placeholder="Phone">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                            <input required type="text" class="form-control" name="father" placeholder="Father's Name">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                                <input required type="text" class="form-control" name="mother" placeholder="Mother's Name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                    <input required type="text" class="form-control" name="address" placeholder="Permanent address">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                        <input required type="text" class="form-control" name="guardian" placeholder="Local Guardian Name">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-"></span>
                                            </div>
                                        </div>
                                    </div>


                   

            </div>
            <div class="row">
                <div class="col-8">

                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Apply</button>
                </div>
                <!-- /.col -->
            </div>
            </form>



            <a href="/login" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->

    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script>
            if (window.location.href.includes('msg')) {
              document.getElementById("msg").innerHTML = decodeURI(window.location.href.split("msg=")[1]);
            }
          </script>
</body>

</html>