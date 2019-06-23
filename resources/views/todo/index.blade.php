@extends('layouts.app')

@section('content')
        <div class="text-center my-5">
            <h1>LIST TODO</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Todos
                        <div class="float-right">
                            <a href="/todos/create-task" class="btn btn-sm btn-success">New</a>
                        </div>                        
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($todos as $todo)
                                <li class="list-group-item">
                                    {{$todo->name}}
                                    <div class="float-right">
                                        @if(!$todo->completed)
                                        <a href="/todos/{{$todo->id}}/completed" class="btn btn-sm btn-info">Completed</a>
                                        @endif
                                        <a href="/todos/{{$todo->id}}" class="btn btn-sm btn-primary">view</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection