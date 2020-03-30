<?php

namespace App\Http\Controllers;

use App\Deal;

class ServiceController extends Controller
{
    public function search(){
        $deals = Deal::query();

//        if(){
//
//        };
//        if(){
//
//        };
//        if(){
//
//        };

        return $deals->get();
    }

}
