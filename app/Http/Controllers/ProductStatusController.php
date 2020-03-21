<?php

namespace App\Http\Controllers;

use App\Deal;
use App\Product;
use App\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductStatusController extends Controller
{
    /**
     * @param $lead_id
     * @param $product_id
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function showForm($lead_id, $product_id){
        $price = Product::find( $product_id)->price;
        $user_id = Auth::user()->id;
        $statuses = Status::all();
        return view('product_status.store',
            compact('lead_id', 'product_id', 'statuses', 'price', 'user_id'));
    }

    public function storeStatus(Request $request){

        Deal::create([
            'expectation' => $request->expectation,
            'user_id' => $request->user_id,
            'lead_id' => $request->lead_id,
            'status_id' => $request->status_id,
            'product_id' => $request->product_id,
            'start_date' => now(),
            'close_date' => now()
        ]);

        return redirect()->route('leads.show', $request->lead_id)
            ->with(compact('success', 'Product status updated successfully') );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id){
        dd($id);
    }
}
