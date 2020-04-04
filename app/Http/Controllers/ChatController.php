<?php

namespace App\Http\Controllers;


use App\Chat;
use App\Http\Requests\ChatRequest;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * @param $lead_id
     * @param $deal_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function showForm($lead_id, $deal_id){
        $user_id = Auth::user()->id;
        return view('chats.create', compact('lead_id', 'deal_id', 'user_id'));
    }

    /**
     * @param ChatRequest $request
     * @return $this
     */
    public function storeChat(ChatRequest $request){
        $input = $request->validated();
        Chat::create($input);
        return redirect()->route('leads.show', $request->lead_id)
            ->with('success', 'Chat saved successfully');
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
