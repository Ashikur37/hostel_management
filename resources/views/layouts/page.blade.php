<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hostel__Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
      
            .fa {
              padding: 10px;
              font-size: 20px;
              width: 40px;
              text-align: center;
              text-decoration: none;
              margin: 5px 2px;
            }
            
            .fa:hover {
                opacity: 0.7;
            }
            
            .fa-facebook {
              background: #3B5998;
              color: white;
            }
            
            .fa-twitter {
              background: #55ACEE;
              color: white;
            }
            
            .fa-google {
              background: #dd4b39;
              color: white;
            }
            
            .fa-linkedin {
              background: #007bb5;
              color: white;
            }
            
            .fa-youtube {
              background: #bb0000;
              color: white;
            }
            
            .fa-instagram {
              background: #125688;
              color: white;
            }
            
            .fa-pinterest {
              background: #cb2027;
              color: white;
            }
            
            .fa-snapchat-ghost {
              background: #fffc00;
              color: white;
              text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
            }
            
            .fa-skype {
              background: #00aff0;
              color: white;
            }
            
            .fa-android {
              background: #a4c639;
              color: white;
            }
            
            .fa-dribbble {
              background: #ea4c89;
              color: white;
            }
            
            .fa-vimeo {
              background: #45bbff;
              color: white;
            }
            
            .fa-tumblr {
              background: #2c4762;
              color: white;
            }
            
            .fa-vine {
              background: #00b489;
              color: white;
            }
            
            .fa-foursquare {
              background: #45bbff;
              color: white;
            }
            
            .fa-stumbleupon {
              background: #eb4924;
              color: white;
            }
            
            .fa-flickr {
              background: #f40083;
              color: white;
            }
            
            .fa-yahoo {
              background: #430297;
              color: white;
            }
            
            .fa-soundcloud {
              background: #ff5500;
              color: white;
            }
            
            .fa-reddit {
              background: #ff5700;
              color: white;
            }
            
            .fa-rss {
              background: #ff6600;
              color: white;
            }
            </style>
</head>

<body>
    <div class="row" style="margin: 10px;">
        <div class="col-md-10">
            <h3>Hostel Management System for HUB</h3>
        </div>
        <div class="col-md-2">
            <a href="/login" class="btn btn-outline-success btn-outline ">
                Login
            </a>
        </div>
    </div>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="/" style="padding-top: 0px;padding-bottom:0px ;">
            <img style="width:45px;"
                src="data:image/jpeg;base64,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"
                alt="">
        </a>

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Hostel Type
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="male-hostel">Male</a>
                    <a class="dropdown-item" href="female-hostel">Female</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/hostel-facility">Hostel Facilities</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/rules&regulation">Rules & Regulation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/notice">Notice</a>
            </li>
        </ul>
    </nav>
    <div class="containe" >
            @yield('content')
            
        </div>
        <div id="footer" class="navbar navbar-expand-sm bg-dark navbar-dark" style="position: absolute;
        bottom: 0;width: 100%;">
            <div class="col-md-6">
                    <strong style="color: antiquewhite;">Copyright © 2019-2020 <a href="/">Hamdard University</a></strong>
            </div>
            <div class="col-md-6">
                <a href="/contact">Contat Us</a>
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-google"></a>
                <a href="#" class="fa fa-linkedin"></a>
            </div>
        </div>
        
</body>


</html>