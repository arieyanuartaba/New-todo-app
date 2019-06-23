<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    
    public function dashboard(){

        $all = Todo::all()->count();
        $complete = Todo::where('completed', true)->count();

        return view('welcome', compact('all', 'complete'));
    }

    public function index(){
        
        return view('todo.index')->with('todos', $todos = Todo::all());

    }

    public function show(Todo $todo){

        return view('todo.show')->with('todo', $todo);
    }

    public function create(){

        return view('todo.create');
    }

    public function store(){

        $this->validate(request(),[
            'name' => 'required|min:6|max:20',
            'description' => 'required'
        ]);
        $data = request()->all();
      
        $todo = new Todo;

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        $todo->save();

        session()->flash('success', 'Task successfully create');

        return redirect('/todos');
    }

    public function edit(Todo $todo){

        return view('todo.edit')->with('todo', $todo);
    }

    public function update(Todo $todo){
        $this->validate(request(),[
            'name' => 'required|min:6|max:20',
            'description' => 'required'
        ]);
        $data = request()->all();

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->update();

        session()->flash('success', 'Task successfully updated');

        return redirect('todos');

    }

    public function destroy(Todo $todo){

        $todo->delete();

        session()->flash('success', 'Todo Deleted');

        return redirect('/todos');
    }

    public function completed(Todo $todo){
        
        $todo->completed = true;
        $todo->save();
        
        session()->flash('success', 'Todo Completed');

        return redirect('todos');
    }
}
