<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Http\Requests\LeadRequest;
use App\Imports\LeadsImport;
use App\Lead;
use App\Product;
use App\User;
use App\Deal;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
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


        $user = User::find($input['user_id']);

        // Save to lead_user table
        $user->leads()->attach($lead->id);

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
     * @param Lead $lead
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();


        return redirect()->route('leads.index')
            ->with('success', 'Lead deleted successfully');
    }

    public function upload(){
        return view('leads.upload');
    }

    public function uploadPost(Request $request){
        $request->validate([
           'file' => 'required|mimes:xlx,xlsx,csv,ods|max:2048'
        ]);

        $fileName = time(). '.' .$request->file->extension();
        $request->file->move(public_path('uploads'), $fileName);

        Excel::import(new LeadsImport, 'uploads/'.$fileName);

        return redirect()->route('leads.index')
            ->with('success', 'Leads uploaded successfully');
    }

}
