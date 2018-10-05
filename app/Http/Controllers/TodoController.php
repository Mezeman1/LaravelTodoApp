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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * @param  \App\Todo  $todo item to delete.
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


    private function showSuccesMessage($value) {
        Session::flash('succes', $value);
    }

    private function redirectIndex() {
        return redirect()->route('todo.index');
    }
}
