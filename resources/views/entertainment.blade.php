@extends('layouts.page')
@section('content')

<div class="jumbotron">
    <center>
        <h3>Entertainments</h3>
    </center>
    <img style="width:300px" src="/images/enter/1.jpg" alt="">
    <img style="width:300px" src="/images/enter/2.jpg" alt="">
    <img style="width:300px" src="/images/enter/3.jpg" alt="">
    <img style="width:300px" src="/images/enter/4.jpg" alt="">
    <img style="width:300px" src="/images/enter/5.jpg" alt="">
</div>
<script>
window.setTimeout(function(){
        document.getElementById("footer").style.position="relative";
    },100)
</script>
@endsection