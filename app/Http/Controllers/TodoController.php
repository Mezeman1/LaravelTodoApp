<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Session;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $todos = Todo::latest()->paginate(6);
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'body' => 'required|min:5|max:255'
        ]);

        $todo = new Todo;

        $todo->body = $request->body;
        
        if($request->completed == 'on'){
            $todo->completed = 1;
        }

        $todo->save();
        $value = "New todo has been added to the list.";
        $this->showSuccesMessage($value);

        return redirect()->route('Todo.index');
    }

    public function showSuccesMessage($value) {
        Session::flash('succes', $value);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'body' => 'required|min:5|max:255'
        ]);

        $todo = Todo::findOrFail($id);

        $todo->body = $request->body;

        if($request->completed == 'on'){
            $todo->completed = 1;
        } else {
            $todo->completed = 0;
        }

        $todo->save();

        return redirect()->route('Todo.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);

        $todo->delete();

        $value = "Succesfully deleted the todo item.";
        $this->showSuccesMessage($value);

        return redirect()->route('Todo.index');
    }
}
