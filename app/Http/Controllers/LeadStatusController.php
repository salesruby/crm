<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadStatusRequest;
use App\LeadStatus;
use App\Status;

class LeadStatusController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function showForm($id){
        $statuses = Status::all();
        return view('lead_status.create', compact('id', 'statuses'));
    }

    public function storeStatus(LeadStatusRequest $request){
        $input = $request->validated();
        LeadStatus::create($input);

        return redirect()->route('leads.index')
            ->with('success', 'Lead status updated successfully');
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
