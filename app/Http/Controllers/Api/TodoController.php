<?php

namespace App\Http\Controllers\Api;

use App\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return Todo::all();
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
        $todo->completed = $request->completed;

        $todo->save();

        return $todo;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Todo::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'To update a todo app, use /api/Todo/{$id}, as a PATCH method.';
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
        $todo->completed = $request->completed;

        $todo->save();

        return $todo;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
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
