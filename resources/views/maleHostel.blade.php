@extends('layouts.page')
@section('content')
<style>
        .vertical-menu {
          width: 200px;
        }
        
        .vertical-menu a {
          background-color: #eee;
          color: black;
          display: block;
          padding: 12px;
          text-decoration: none;
        }
        
        .vertical-menu a:hover {
          background-color: #ccc;
        }
        
        .vertical-menu a.active {
          background-color: #4CAF50;
          color: white;
        }
        </style>
<div style="margin: 10px;">
    <center>
            <h4 style="border-bottom: 2px solid green; width: 200px;">Male Hostel1</h4>
    </center>
    <div class="row">
        <div class="col-md-5">
                <div class="vertical-menu">
                        
                        <a href="#">Total Seat</a>
                        <a href="#">Available </a>
                        <a href="#">Apply</a>
                      </div>
        </div>
        <div class="col-md-6">
            <div id="googleMap" style="width:100%;height:200px;"></div>
        </div>
    </div>
    <center style="margin-top:20px;">
            <h4 style="border-bottom: 2px solid green; width: 200px;">Male Hostel2</h4>
    </center>
    <div class="row">
        <div class="col-md-5">
                <div class="vertical-menu">
                        
                        <a href="#">Total Seat</a>
                        <a href="#">Available </a>
                        <a href="#">Apply</a>
                      </div>
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
            center: new google.maps.LatLng(23.5980367, 90.6173902),
            zoom: 12,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        var map2 = new google.maps.Map(document.getElementById("googleMap2"), mapProp);
    }
    
</script>

<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCi82DDWkY-_hwoBcUp84sIcnP8pUx8lLc&callback=myMap"></script>
  
@endsection