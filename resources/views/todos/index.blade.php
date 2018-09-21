@extends('layout')
@section('content')
<div class="container">
    <div class="col-12">
      <div class="row">
        <h1>Todo Application</h1>
      </div>

      @include('partials.succes')

      @include('partials.error')
    
      @include('todos.add')

      @include('todos.list')
    </div>
  </div>
@endsection
  
