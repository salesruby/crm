<?php

namespace App\Http\Controllers;


use App\Chat;
use App\Http\Requests\ChatRequest;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function showForm($id){
        $user = Auth::user();
        return view('chats.create', compact('id', 'user'));
    }

    /**
     * @param ChatRequest $request
     * @return $this
     */
    public function storeChat(ChatRequest $request){
        $input = $request->validated();
        Chat::create($input);

        return redirect()->route('leads.index')
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
