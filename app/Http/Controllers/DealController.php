<?php

namespace App\Http\Controllers;

use App\Deal;

class DealController extends Controller
{
    public function all(){
        $deals = Deal::all();
        return view('deals.all')->with(compact('deals'));
    }

    public function open(){
        return view('deals.open');
    }

    public function closed(){
        return view('deals.closed');
    }

    public function deadline(){
        return view('deals.deadline');
    }
}
