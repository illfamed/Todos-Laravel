@extends('layout')

@section('content')
    <form action="/create/todo" method="POST">
        {{ csrf_field() }}
        <input type="text" class="form-control input-lg" name="todo" placeholder="Create a new todo">
    </form>
    <hr>
    <div class="row">
        @foreach($todos as $todo)
            <div class="col-md-6">
                {{ $todo->todo }} 
            </div>
            <div class="col-md-6">
                 @if(!$todo->completed)
                    <a href="{{ route('todos.completed', ['id' => $todo->id]) }}" class="btn btn-md btn-success">Mark as completed</a>
                @else
                    <span class="text-success">Compelted!</span>
                @endif
                <a href="{{ route('todo.update', ['id' => $todo->id]) }}" class="btn btn-info btn-md"> Update </a>
                <a href="{{ route('todo.delete', ['id' => $todo->id]) }}" class="btn btn-md btn-danger"> Delete </a>
            </div>
        @endforeach
    </div>
@stop