<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Session;

class TodoController extends Controller
{
    /**
     * Display a list of the todo items.
     *
     * @return \Illuminate\Http\Response redirect to index.
     */
    public function index()
    {   
        $todos = Todo::latest()->paginate(6);
        return view('todos.index', compact('todos'));
    }

    /**
     * Store a newly created todo item inside the database.
     *
     * @param  \Illuminate\Http\Request  $request data send by user.
     * @return \Illuminate\Http\Response redirect to index.
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'title' => 'required|min:3|max:255',
            'body' => 'required|min:5|max:255'
        ]);

        $todo = new Todo;
        $todo->title = $request->title;
        $todo->body = $request->body;
        
        if($request->completed == 'on'){
            $todo->completed = 1;
        }

        $todo->save();

        $value = "New todo has been added to the list.";
        $this->showSuccesMessage($value);

        return $this->redirectIndex();
    }

    /**
     * Show the form for editing the todo item selected.
     *
     * @param  $id item to edit.
     * @return \Illuminate\Http\Response redirect to view.
     */
    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the todo item in the database.
     *
     * @param  \Illuminate\Http\Request  $request data send by user.
     * @param  $id item to update.
     * @return \Illuminate\Http\Response redirect to index.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=> 'required|min:5|max:255',
            'body' => 'required|min:5|max:255'
        ]);

        $todo = Todo::findOrFail($id);

        $todo->title = $request->title;
        $todo->body = $request->body;        

        if($request->completed == 'on'){
            $todo->completed = 1;
        } else {
            $todo->completed = 0;
        }

        $todo->save();

        return $this->redirectIndex();

    }

    /**
     * Remove the todo from database.
     *
     * @param  $id item to delete.
     * @return \Illuminate\Http\Response redirect after deletion.
     */
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        $deleteMessage = "Succesfully deleted the todo item.";
        $this->showSuccesMessage($deleteMessage);

        return $this->redirectIndex();
    }

    /**
     * Flashes the message specified.
     * 
     * @param $value the message to flash.
     */
    private function showSuccesMessage($value) {
        Session::flash('succes', $value);
    }

    /**
     * Returns a redirect to the index page.
     * Created this method so that if I do decide to change the name,
     * I can refactor this in a single method.
     */
    private function redirectIndex() {
        return redirect()->route('todo.index');
    }
}
