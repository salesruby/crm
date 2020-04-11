<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Deal;
use App\Product;
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

//    public function create(){

    // Save to lead_product table
//$lead->products()->attach($input['product_ids']);
//        // Save to deals table
//        foreach ($input['product_ids'] as $key => $productId) {
//            $product = Product::find($productId);
//            $deal = Deal::create([
//                'expectation' => $product->price,
////                   'quantity' => "",
////                   'total_expectation' => "",
//                'lead_id' => $lead->id,
//                'user_id' => $user->id,
//                'status_id' => 1,
//                'product_id' => $productId,
//                'start_date' => now(),
//                'close_date' => now()
//            ]);
//
//            Chat::create([
//                'lead_id' => $lead->id,
//                'user_id' => $user->id,
//                'status' => 0,
//                'deal_id' => $deal->id,
//                'summary' => 'New lead',
//                'next_dated_step' =>$input['next_dated_step'],
//                'action' => 'Call or Mail '.$input['first_name'] .' '.$input['last_name']
//            ]);
//
//        }
//        return redirect()->route('deals.index')
//            ->with('success', 'Lead created successfully.');
//
//
//    }

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

    public function confirm($id){
        Deal::where('id', $id)
            ->update(['confirmed' => 1]);

        return redirect()->route('deals.closed')
            ->with('success', 'Deal confirmed');
    }


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

