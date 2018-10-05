<?php

namespace App\Http\Controllers\Api\v1;

use App\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    /**
     * Display a listing of all the todos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return Todo::all();
    }

    /**
     * Store a newly created todo to the database.
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
        $todo->completed = $request->completed;

        $todo->save();

        return $todo;
    }

    /**
     * Display the specified todo.
     *
     * @param  $id item to show.
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Todo::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id item to edit.
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
        $todo->completed = $request->completed;

        $todo->save();

        return $todo;

    }

    /**
     * Remove the todo from the database.
     *
     * @param  $id item to delete.
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        if($todo != null){
            $todo->delete();
            return "Deleted succesfully!";
        }

        return "Couldn't find the todo item with id: {$id}.";
    }
}
