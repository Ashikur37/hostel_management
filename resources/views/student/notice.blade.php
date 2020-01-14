@extends('layouts.student')

@section('content')

<div class="card card-prirary cardutline direct-chat direct-chat-primary">
        <div class="card-header">
          <h3 class="card-title">Admin</h3>
          </div>
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
@endsection