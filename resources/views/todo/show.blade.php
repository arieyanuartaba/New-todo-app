@extends('layouts.app')

@section('title')
<title>{{$todo->name}}</title>
@endsection

@section('content')
<div class="text-center my-5">
    <h1>Show the Detail</h1>
</div>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                {{$todo->name}}
            </div>
            <div class="card-body">
                {{$todo->description}}
            </div>
        </div>
        <a href="/todos/{{$todo->id}}/edit" class="btn btn-sm btn-primary mt-2">Edit</a>
        <a href="/todos/{{$todo->id}}/delete" class="btn btn-sm btn-danger mt-2">Delete</a>
    </div>
</div>
@endsection