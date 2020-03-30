@extends('layouts.app')

@section('page-title-row')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">To-Do</h4>
            </div>
        </div>
        <!-- end row -->
    </div>
@endsection

@section('stats')
    <div id="all-todo" class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4 create-task">
                    <div class="row">
                        <h6 class="col-md-7">Create Task</h6>
                        <div class="col-md-5 mini-stat-icon">
                            <i class="mdi mdi-calendar-plus bg-primary text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row to-do-list">
                        <span id="toggle-create-todo-form" class="col-md-12 text-center mini-stat-icon"
                              data-toggle="collapse" data-target="#create-todo-form">
                            <i class="mdi mdi-plus bg-default text-white"></i>
                        </span>
                <div id="create-todo-form" class="collapse col-md-12">
                    <form method="POST">
                        @csrf
                        <input id="action" class="form-control" value="{{old('action')}}" placeholder="Enter Task"
                               autofocus/>
                        <input type="datetime-local" id="next_dated_step" class="form-control"
                               value="{{old('next_dated_step')}}" placeholder="Enter Task" autofocus/>
                        <button type="submit" class="btn btn-">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4 tomorrow-task ">
                    <div class="row">
                        <h6 class="col-md-7">Tomorrow</h6>
                        <div class="col-md-5 mini-stat-icon">
                            <i class="mdi mdi-calendar-multiple bg-warning text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row to-do-list">
                <ul id="tomorrow-list">
                    @foreach($tomorrow_tasks as $tomorrow_task)
                        <li id="tomorrow_task{{$tomorrow_task->id}}"
                            data-id="{{$tomorrow_task->id}}">{{$tomorrow_task->action}}</li>
                        @csrf
                    @endforeach
                </ul>
            </div>
        </div>

        <div id="today" class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4 today-task">
                    <div class="row">
                        <h6 class="col-md-7">Today</h6>
                        <div class="col-md-5 mini-stat-icon">
                            <i class="mdi mdi-calendar-today bg-danger text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div id="today-list-div" class="row to-do-list" style="background-color: red;">
                <ul id="today-list">
                    @foreach($today_tasks as $today_task)
                        <li id="today_task{{$today_task->id}}"
                            data-id="{{$today_task->id}}">{{$today_task->action}}</li>
                        @csrf
                    @endforeach
                </ul>
            </div>
        </div>

        <div id="done" class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4 done-task">
                    <div class="row">
                        <h6 class="col-md-7">Done</h6>
                        <div class="col-md-5 mini-stat-icon">
                            <i class="mdi mdi-calendar-check bg-success text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div id="done-list-div" class="row to-do-list">
                <ul id="done-list">
                    @foreach($done as $done_task)
                        <li id="done_task{{$done_task->id}}" data-id="{{$done_task->id}}">{{$done_task->action}}</li>
                        @csrf
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection