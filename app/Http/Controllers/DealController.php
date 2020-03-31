<?php

namespace App\Http\Controllers;

use App\Deal;
use Illuminate\Http\Request;

class DealController extends Controller
{
    protected $deals;

    public function __construct()
    {
        $this->deals = Deal::all();
    }

    public function index(Request $request){
        $selected_product = (int)$request->product;
        $deals = $this->search($request)->get();
        return view('deals.all')->with(compact('deals', 'selected_product'));
    }

    public function open(Request $request){
        $selected_product = (int)$request->product;
        $open_deals = $this->search($request)->whereIn('status_id', [1, 2, 3])->get();
        return view('deals.open')->with(compact('open_deals', 'selected_product'));
    }

    public function closed(Request $request){
        $selected_product = (int)$request->product;
        $closed_deals = $this->search($request)->whereIn('status_id', [4,5])->get();
        return view('deals.closed')->with(compact('closed_deals', 'selected_product'));
    }

    public function pending(Request $request){
        $selected_product = (int)$request->product;
        $closed_deals = $this->search($request)
            ->whereIn('status_id', [4,5])
            ->where('confirmed', 0)->get();
        return view('deals.pending')->with(compact('closed_deals', 'selected_product'));
    }

    public function confirmDeal($id){
        Deal::where('id', $id)
            ->update(['confirmed' => 1]);

        return redirect()->route('deals.all')
            ->with('success', 'Deal confirmed');
    }


//    public function userDeal(){
//        $user = auth()->user();
//
//        $user_deals = $this->deals->where('user_id', $user->id);
//
//        if (!$user->isSalesRep()){
//            $user_deals = $this->deals;
//        }
//
//        return $user_deals;
//
//    }

    public function search(Request $request){

        $user = auth()->user();

        $deals = Deal::query();
        if($request['product']){
            $deals->where('product_id', $request['product']);
        }
        if($request['start_date']){
            $deals->where('start_date', $request['start_date']);
        }
        if($request['closed_date']){
            $deals->where('close_date', $request['closed_date']);
        }

        if (!$user->isSalesRep()){
            $user_deals = $deals;
        }else{
            $user_deals = $deals->where('user_id', $user->id);
        }

        return $user_deals;

    }

}

