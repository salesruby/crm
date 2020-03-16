<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Lead;
use App\Product;
use App\User;


class LeadController extends Controller
{
    /**
     * LeadController constructor.
     */
    function __construct()
    {
        $this->middleware('permission:lead-list|lead-create|lead-edit|lead-delete', ['only' => ['index','show']]);
        $this->middleware('permission:lead-create', ['only' => ['create','store']]);
        $this->middleware('permission:lead-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:lead-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = Lead::latest()->paginate(5);
        return view('leads.index',compact('leads'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rep = User::role('Sales')->get();
        $products = Product::all();
        return view('leads.create', compact(['rep','products']));
    }

    /**
     * @param LeadRequest $request
     * @return $this
     */
    public function store(LeadRequest $request)
    {
        $input = $request->validated();
        Lead::create($input);


        return redirect()->route('leads.index')
            ->with('success','Lead created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        return view('leads.show',compact('lead'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        return view('leads.edit',compact('lead'));
    }


    /**
     * @param LeadRequest $request
     * @param Lead $lead
     * @return $this
     */
    public function update(LeadRequest $request, Lead $lead)
    {
        $input = $request->validated();

        $lead->update($input);


        return redirect()->route('leads.index')
            ->with('success','Lead updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();


        return redirect()->route('leads.index')
            ->with('success','Lead deleted successfully');
    }
}