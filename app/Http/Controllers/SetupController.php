<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class SetupController extends Controller
{
    public function index(){
        Artisan::call('migrate');
        Artisan::call('db:seed');

        return view('setup')->with(['success'=>'Database Successfully created']);
    }
}
