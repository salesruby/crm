<?php

namespace App\Http\Controllers;

use App\Deal;

class DealController extends Controller

{
    protected $deals;

    public function __construct()
    {
        $this->deals = Deal::all();
    }

    public function all(){
        $deals = $this->deals;
        return view('deals.all')->with(compact('deals'));
    }

    public function open(){

        $open_deals = [];
        foreach ($this->deals as $deal){
            if($deal->status->alias == 'open'){
                $open_deals[]= $deal;
            }
        }
        return view('deals.open')->with(compact('open_deals'));
    }

    public function closed(){
        $closed_deals = [];
        foreach ($this->deals as $deal){
            if($deal->status->alias == 'closed'){
                $closed_deals[]= $deal;
            }
        }
        return view('deals.closed')->with(compact('closed_deals'));
    }

    public function deadline(){
        return view('deals.deadline');
    }
}
