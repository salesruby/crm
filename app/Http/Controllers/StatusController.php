<?php


namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use App\Status;

class StatusController extends Controller
{
    /**
     * StatusController constructor.
     */
    function __construct()
    {
        $this->middleware('permission:status-list|status-create|status-edit|status-delete', ['only' => ['index','show']]);
        $this->middleware('permission:status-create', ['only' => ['create','store']]);
        $this->middleware('permission:status-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:status-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::latest()->paginate(5);
        return view('statuses.index',compact('statuses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statuses.create');
    }


    /**
     * @param StatusRequest $request
     * @return $this
     */
    public function store(StatusRequest $request)
    {
        $input = $request->validated();

        Status::create($input);

        return redirect()->route('statuses.index')
            ->with('success','Status created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        return view('statuses.show',compact('status'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        return view('statuses.edit',compact('status'));
    }


    /**
     * @param StatusRequest $request
     * @param Status $status
     * @return $this
     */
    public function update(StatusRequest $request, Status $status)
    {
        $input = $request->validated();

        $status->update($input);

        return redirect()->route('statuses.index')
            ->with('success','Status updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        $status->delete();


        return redirect()->route('statuses.index')
            ->with('success','Status deleted successfully');
    }
}