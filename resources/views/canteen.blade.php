@extends('layouts.page')
@section('content')

<div class="jumbotron">
    <center>
        <h3>Canteen</h3>
    </center>
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rerum blanditiis, voluptatum delectus quidem, ea omnis eaque magni consequatur nemo magnam optio similique iusto corporis debitis error? Eum, distinctio temporibus. Voluptates.
    <h4>
        Find us
    </h4>
    <div id="googleMap" style="width:100%;height:200px;"></div>
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