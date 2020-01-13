@extends('layouts.page')
@section('content')
<style>
    li{
        margin: 5px;
        font-weight: 500;
        padding-top: 10px;
    }
</style>
<div class="ju">
    <center>
        <h3>Notices</h3>
    </center>
    <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <table class="table table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Details</th>
                        <th>Published At</th>
                    </tr>
                </thead>
                <tbody>
                @php ($i = 1)
                @foreach ($notices as $notice)
            <tr>
                <td>{{$i}}</td>
                <td>{{$notice->title}}</td>
                <td>{{$notice->body}}</td>
                <td>{{$notice->created_at}}</td>
                @php ($i++)
            </tr>
                @endforeach
                </tbody>
            </table>
            </div>
    </div>
    
        
       

    
</div>
<script>

</script>
@endsection