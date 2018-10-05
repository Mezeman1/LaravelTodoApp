@extends('layout')
@section('content')
<form action="{{ 
  route(
    'todo.update', 
    ['todo'=>$todo->id]
  )}}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PATCH">
    <div class="form-group">
      <label for="body">Todo title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{$todo->title}}">
    </div>
    <div class="form-group">
      <label for="body">Todo body</label>
    <input type="text" class="form-control" id="body" name="body" value="{{$todo->body}}">
    </div>
    <div class="form-group form-check">
      @if ($todo->completed)
        <input type="checkbox" class="form-check-input" id="completed" name="completed" checked>
      @else
        <input type="checkbox" class="form-check-input" id="completed" name="completed" >
      @endif
      <label class="form-check-label" for="completed">Already completed?</label>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
