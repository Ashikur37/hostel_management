@extends('layouts.admin')

@section('content')
Welcome 
@if(auth()->user()->type==8)
  Admission Panel
  @elseif(auth()->user()->type==9)
  Accountant
  @else
  Warden
  @endif
@endsection