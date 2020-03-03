@extends('layouts.admin')

@section('content')
Welcome 
@if(auth()->user()->type==8)
  Admission Officer
  @else
  Warden
  @endif
@endsection