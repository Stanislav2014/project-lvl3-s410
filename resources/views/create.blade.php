@extends('layouts.app')

@section('content')
<form class="jumbotron" action="{{ route('domains.store') }}" method="post" >
  <input type="url" class="form-control" 
  name="name" required placeholder="Enter site address example: http://domain.zone">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Submit</button>  
</form>
@if (isset($errors))
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection

