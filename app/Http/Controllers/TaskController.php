<?php

namespace App\Http\Controllers;

use App\Chat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Chat::find(1)->first();
        $dt = Carbon::parse($tasks->created_at);
//
//        $date = [];
//
//        return [$dt, Carbon::today()];

        $tasks = Chat::all();
        return view('tasks.index')->with('tasks', $tasks);
    }

    public function update(Request $request){
        Chat::where('id', $request->id)
            ->update(['status' =>  1]);
//
//        return response()->json([
//            "message"
//        ])
    }

}
