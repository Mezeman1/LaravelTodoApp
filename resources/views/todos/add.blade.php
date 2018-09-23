<form action="{{ route('Todo.store')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Enter todo title">
    </div>
    <div class="form-group">
      <label for="body">What is it you have to do?</label>
      <input type="text" class="form-control" id="body" name="body" placeholder="Enter todo">
    </div>
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="completed" name="completed">
      <label class="form-check-label" for="completed">Did you complete it yet?</label>
    </div>
    <button type="submit" class="btn btn-primary" style="margin:10px">Add todo</button>
</form>