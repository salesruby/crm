<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Http\Requests\LeadRequest;
use App\Lead;
use App\Product;
use App\User;
use App\Deal;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class LeadController extends Controller
{
    /**
     * LeadController constructor.
     */
    function __construct()
    {
        $this->middleware('permission:lead-list|lead-create|lead-edit|lead-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:lead-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:lead-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:lead-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        if (!$user->isSalesRep()){
            $leads = Lead::latest()->paginate(5);
        }else{
            $leads = $user->leads;
        }

        return view('leads.index', compact('leads'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::role('Sales')->get();
        $products = Product::all();
        return view('leads.create', compact(['users', 'products']));

    }


    /**
     * @param LeadRequest $request
     * @return $this
     */
    public function store(LeadRequest $request)
    {
        $input = $request->validated();
        $lead = Lead::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'company_name' => $input['company_name'],
            'designation' => $input['designation']
        ]);

        // Save to lead_product table
        $lead->products()->attach($input['product_ids']);

        $user = User::find($input['user_id']);

        // Save to lead_user table
        $user->leads()->attach($lead->id);

        // Save to deals table
        foreach ($input['product_ids'] as $key => $productId) {
            $product = Product::find($productId);
            $deal = Deal::create([
                'expectation' => $product->price,
//                   'quantity' => "",
//                   'total_expectation' => "",
                'lead_id' => $lead->id,
                'user_id' => $user->id,
                'status_id' => 1,
                'product_id' => $productId,
                'start_date' => now(),
                'close_date' => now()
            ]);

            Chat::create([
                'lead_id' => $lead->id,
                'user_id' => $user->id,
                'status' => 0,
                'deal_id' => $deal->id,
                'summary' => 'New lead',
                'next_dated_step' =>$input['next_dated_step'],
                'action' => 'Call or Mail '.$input['first_name'] .' '.$input['last_name']
            ]);

        }

        return redirect()->route('leads.index')
            ->with('success', 'Lead created successfully.');


    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Lead $lead
     * @return \Illuminate\Http\Response
     */


    public function show(Lead $lead)
    {
//        i removed chats variable in the compact

        return view('leads.show', compact('lead'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lead $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        return view('leads.edit', compact('lead'));
    }


    /**
     * @param Lead $lead
     * @param Request $request
     * @return $this
     */
    public function update(Lead $lead, Request $request)
    {
        $input = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:leads,email,'. $lead->id .',id',
            'phone' => 'required|max:20',
            'company_name' => 'required',
            'designation' => 'required',
        ]);

        $lead->update($input);

        return redirect()->route('leads.index')
            ->with('success', 'Lead updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lead $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();


        return redirect()->route('leads.index')
            ->with('success', 'Lead deleted successfully');
    }
}