@extends('layouts.page')
@section('content')

<div style="margin: 10px;">
  <center>
    <h4 style="border-bottom: 2px solid green; width: 200px;">Girls Hostel</h4>
  </center>
  <div class="row">
    <div class="col-md-5">
      <!--Navbar-->
<nav class="navbar navbar-dark navbar-2 bg-success mb-4">
    <a class="navbar-brand" href="#">Girls Hostel 2</a>
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
          <a class="nav-link" href="#">Total Seat({{$girls[0]->total_seat}}) <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Available({{$girls[0]->total_available}})</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/apply?hostel=7">Apply</a>
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