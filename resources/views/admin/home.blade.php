@extends('layouts.admin')

@section('content')
Welcome 
@if(auth()->user()->type==8)
  Admission Panel
  @else
  Warden
  @endif
@endsection