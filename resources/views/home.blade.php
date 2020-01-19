@extends('layouts.page')
@section('content')
<style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 70%;
  }
  </style>
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    
    <div class="carousel-item active">
      <img src="images/1.jpg" alt="Los Angeles" width="1100" height="500">
    </div>
    <div class="carousel-item ">
      <img src="images/2.jpg" alt="Los Angeles" width="1100" height="500">
    </div>
    <div class="carousel-item ">
      <img src="images/3.jpg" alt="Los Angeles" width="1100" height="500">
    </div>
    <div class="carousel-item ">
      <img src="images/4.jpg" alt="Los Angeles" width="1100" height="500">
    </div>
    
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
@endsection