@extends('layouts.page')
@section('content')
<style>
    li{
        margin: 5px;
        font-weight: 500;
        padding-top: 10px;
    }
</style>
<div class="jumbotron">
    <center>
        <h3>Hostel Facilities</h3>
    </center>
    <div>
        <h4>
            Canteen
        </h4>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet officia odit, perspiciatis ab laboriosam earum omnis consectetur ipsam ullam dolores alias veritatis, voluptatibus a mollitia doloribus facilis quaerat, fugiat repudiandae.
    </div>
    <div>
        <h4>
            Entertainment
        </h4>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet officia odit, perspiciatis ab laboriosam earum omnis consectetur ipsam ullam dolores alias veritatis, voluptatibus a mollitia doloribus facilis quaerat, fugiat repudiandae.

    </div>
    <div>
        <h4>
            Others
        </h4>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet officia odit, perspiciatis ab laboriosam earum omnis consectetur ipsam ullam dolores alias veritatis, voluptatibus a mollitia doloribus facilis quaerat, fugiat repudiandae.

    </div>
</div>
<script>
window.setTimeout(function(){
        document.getElementById("footer").style.position="relative";
    },100)
</script>
@endsection