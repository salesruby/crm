@extends('layouts.app')

@section('content')
    @extends('layouts.deal-layout')
    <div class="page-title-box">
        <div class="row">
            <h5 class="col-sm-11 ">To-Do</h5>
        </div>
    </div>
    <div class="row">
        <div class="today col-md-3" style="border: thin black solid;">
            <h5>Today</h5>
            <ul id="today-list">
                @foreach($tasks as $task)
                <li id="task{{$task->id}}" data-id="{{$task->id}}">{{$task->action}}</li>
                    @csrf
                @endforeach
            </ul>
        </div>

        <div id="done" class="col-md-3" style="border: thin black solid;">
            <h5>Done</h5>
            <ul id="done-list"></ul>
        </div>
    </div>
@endsection