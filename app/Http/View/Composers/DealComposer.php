<?php
/**
 * Created by PhpStorm.
 * User: tujailer
 * Date: 3/19/20
 * Time: 10:30 AM
 */

namespace App\Http\View\Composers;


use App\Lead;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DealComposer
{
    protected $users;
//    protected $leads;

    public function __construct(User $users)
    {
        $this->users = $users;
//        $this->leads = $leads;
    }


    public function compose(View $view){
        $authenticated_user = Auth::user();

        $view->with(compact('authenticated_user'));
    }
}