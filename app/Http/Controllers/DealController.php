<?php

namespace App\Http\Controllers;

class DealController extends Controller
{
    public function all(){
        return view('deals.all');
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
