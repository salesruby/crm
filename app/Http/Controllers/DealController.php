<?php

namespace App\Http\Controllers;

class DealController extends Controller
{
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
