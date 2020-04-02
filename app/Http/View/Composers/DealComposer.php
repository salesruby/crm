<?php
/**
 * Created by PhpStorm.
 * User: tujailer
 * Date: 3/19/20
 * Time: 10:30 AM
 */

namespace App\Http\View\Composers;


use App\Lead;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DealComposer
{

    public function compose(View $view){
        $authenticated_user = Auth::user();
        $users = User::role('Sales')->get();
        $products = Product::all();

        $view->with(compact('authenticated_user', 'products', 'users'));
    }
}