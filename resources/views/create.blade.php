<?php ?>
@extends('layouts.navbar')

@section('content')
<form class="jumbotron" action="{{route('domainsStore')}}" method="post" >
  <input type="url" class="form-control" 
  name="name" required placeholder="Enter site address example: http://domain.zone">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Submit</button>  
</form>

@endsection

