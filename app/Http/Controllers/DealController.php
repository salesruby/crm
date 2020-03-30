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
        $deals = $this->userDeal();
        return view('deals.all')->with(compact('deals'));
    }

    public function open(){
        $deals = $this->userDeal();
        $open_deals = [];
        foreach ($deals as $deal){
            if($deal->status->alias == 'open'){
                $open_deals[]= $deal;
            }
        }
        return view('deals.open')->with(compact('open_deals'));
    }

    public function closed(){
        $deals = $this->userDeal();
        $closed_deals = [];
        foreach ($deals as $deal){
            if($deal->status->alias == 'closed'){
                $closed_deals[]= $deal;
            }
        }
        return view('deals.closed')->with(compact('closed_deals'));
    }

//    public function deadline(){
//        return view('deals.deadline');
//    }

    public function pending(){
        $deals = $this->userDeal();
        $closed_deals = [];
        foreach ($deals as $deal){
            if($deal->confirmed === 0 && $deal->status->alias == 'closed'){
                $closed_deals[] = $deal;
            }
        }
        return view('deals.pending')->with(compact('closed_deals'));
    }

    public function confirmDeal($id){
        Deal::where('id', $id)
            ->update(['confirmed' => 1]);

        return redirect()->route('deals.all')
            ->with('success', 'Deal confirmed');
    }


    public function userDeal(){
        $user = auth()->user();

        $user_deals = $user->deals;

        if (!$user->isSalesRep()){
            $user_deals = $this->deals;
        }

        return $user_deals;
    }
}

