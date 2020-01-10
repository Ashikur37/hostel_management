@extends('layouts.page')
@section('content')
<style>
        .vertical-menu {
          width: 200px;
        }
        
        .vertical-menu a {
         
          display: block;
          padding: 12px;
          text-decoration: none;
        }
        
      
        
        .vertical-menu a.active {
          background-color: #4CAF50;
          color: white;
        }
        </style>
<div style="margin: 10px;">
    <center>
            <h4 style="border-bottom: 2px solid green; width: 200px;">Girls Hostel</h4>
    </center>
    <div class="row">
        <div class="col-md-5">
                <div class="vertical-menu">
                        
                        <a class="btn btn-block btn-info" href="#">Total Seat</a>
                        <a class="btn btn-block btn-primary" href="#">Available </a>
                        <a class="btn btn-block btn-success" href="/apply?hostel=girls">Apply</a>
                      </div>
        </div>
        <div class="col-md-6">
            <div id="googleMap" style="width:100%;height:200px;"></div>
        </div>
    </div>
    
</div>

<script>
   
    function myMap() {
        var mapProp = {
            center: new google.maps.LatLng(23.5980367, 90.6173902),
            zoom: 12,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    }
    
</script>

<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCi82DDWkY-_hwoBcUp84sIcnP8pUx8lLc&callback=myMap"></script>
  
@endsection