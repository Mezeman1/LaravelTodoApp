@if(count($todos))
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>      
      <th scope="col">Body</th>
      <th scope="col">Completed</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($todos as $todo)
      <tr>
        <th scope="row">{{$todo->id}}</th>
        <td>{{$todo->title}}</td>
        <td>{{$todo->body}}</td>
        @if ($todo->completed)
          <td>Finished</td>
        @else
          <td>Not Finished</td>
        @endif
        <td>
        <a href="{{ route('Todo.edit', ['todo'=>$todo->id])}}" class="btn btn-primary">Edit</a>
        </td>
        <td>
        <form action="{{route('Todo.destroy', ['todo'=>$todo->id])}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="DELETE">
              <input type="submit" class="btn btn-danger" value="Delete">
          </form>
        </td>
      </tr>
      @endforeach        
  </tbody>
</table>

<div class="row">
  <div class="col-3"></div>
  <div class="col-3">{{ $todos->links() }}</div>
  <div class="col-3"></div>
</div>
@endif