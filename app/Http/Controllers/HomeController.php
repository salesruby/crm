<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Deal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $leads = $user->leads();
        $deals = $user->deals()->get();
        $revenue = [];
        foreach($deals as $deal ) {
            if ($deal->status->name == 'Won') {
                $revenue[] = $deal->expectation;
            }
        }
        $generated_revenue = array_sum($revenue);

        $tasks = Chat::where('user_id', auth()->user()->id)->get();
        $today_tasks = [];
        foreach ($tasks as $task){
            if(Carbon::parse($task->next_dated_step)->isToday() && $task->status == 0){
                $today_tasks[] = $task;
            }
        }
        $to_do = $today_tasks;



        return view('home')->with(compact('user', 'leads', 'generated_revenue', 'to_do'));
    }
}
