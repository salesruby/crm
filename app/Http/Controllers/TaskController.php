<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Http\Requests\TaskRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Chat::all();
        $today_tasks = [];
        $tomorrow_tasks = [];
        foreach ($tasks as $task){
            if(Carbon::parse($task->next_dated_step)->isToday() && $task->status == 0){
                $today_tasks[] = $task;
            }elseif (Carbon::parse($task->next_dated_step)->isTomorrow() && $task->status == 0){
                $tomorrow_tasks[] = $task;
            }
        }
        $done = Chat::where('status', 1)
//            ->where('next_dated_step', Carbon::today())
            ->latest()
            ->limit(5)
            ->get();

        return view('tasks.index')->with(compact('today_tasks', 'done', 'tomorrow_tasks'));
    }

    public function update(Request $request){
        Chat::where('id', $request->id)
            ->update(['status' =>  $request->status]);
    }


    public function create(TaskRequest $request){

    }
}
