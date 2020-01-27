@extends('layouts.page')
@section('content')

<div style="margin: 10px;">
    <center>
            <h4 style="border-bottom: 2px solid green; width: 200px;">Boys Hostel1</h4>
    </center>
    <div class="row">
        <div class="col-md-5">
                <nav class="navbar navbar-dark navbar-2 bg-success mb-4">
                        <a style="font-size:22px" class="navbar-brand" href="#">Boys Hostel 1</a>
                        <!-- Navbar brand -->
                        <!-- Collapse button -->
                        <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
                          aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text"><i
                              class="fa fa-bars fa-1x"></i></span></button>
                      
                        <!-- Collapsible content -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                      
                          <!-- Links -->
                          <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                              <a class="nav-link" href="#">Total Seat(60) <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">Available({{$boys1[0]->total_available}})</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="/apply?hostel=5">Apply</a>
                            </li>
                          </ul>
                          <!-- Links -->
                      
                        </div>
                        <!-- Collapsible content -->
                      
                      </nav>
                
        </div>
        <div class="col-md-6">
            <div id="googleMap" style="width:100%;height:200px;"></div>
        </div>
    </div>
    <center style="margin-top:20px;">
            <h4 style="border-bottom: 2px solid green; width: 200px;">Boys Hostel2</h4>
    </center>
    <div class="row">
        <div class="col-md-5">
                <nav class="navbar navbar-dark navbar-2 bg-success mb-4">
                        <a style="font-size:22px" class="navbar-brand" href="#">Boys Hostel 2</a>
                        <!-- Navbar brand -->
                        <!-- Collapse button -->
                        <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2"
                          aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text"><i
                              class="fa fa-bars fa-1x"></i></span></button>
                      
                        <!-- Collapsible content -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent2">
                      
                          <!-- Links -->
                          <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                              <a class="nav-link" href="#">Total Seat(60) <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">Available({{$boys2[0]->total_available}})</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="/apply?hostel=6">Apply</a>
                            </li>
                          </ul>
                          <!-- Links -->
                      
                        </div>
                        <!-- Collapsible content -->
                      
                      </nav>
        </div>
        <div class="col-md-6">
            <div id="googleMap2" style="width:100%;height:200px;"></div>
        </div>
    </div>
</div>

<script>
    window.setTimeout(function(){
        document.getElementById("footer").style.position="relative";
    },500)
    function myMap() {
        var mapProp = {
            center: new google.maps.LatLng(23.6019102,90.6229862),
            zoom: 17,
        };
        var mapProp2 = {
            center: new google.maps.LatLng(23.6351263,90.594034),
            zoom: 17,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        var map2 = new google.maps.Map(document.getElementById("googleMap2"), mapProp2);
    }
    
</script>
<script>
window.setTimeout(function(){
        document.getElementById("footer").style.position="relative";
    },100)
</script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCi82DDWkY-_hwoBcUp84sIcnP8pUx8lLc&callback=myMap"></script>
  
@endsection