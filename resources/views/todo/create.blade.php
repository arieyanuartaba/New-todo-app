@extends('layouts.app')

@section('title')
<title>Create a Task</title>
@endsection

@section('content')
    <div class="text-center my-5">
        <h1>Create a Task</h1>
    </div>

    <div class="row justify-content-center">
    <div class="col-md-6">        
        <div class="card">
            <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="list-group">
                    @foreach($errors->all() as $error)
                    <li class="list-group-item">{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="/todos/create" method="post">
            @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" cols="30" rows="5" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-sm btn-success">Create</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    </div>
    
@endsection