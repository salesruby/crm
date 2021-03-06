@extends('layouts.app')
@section('page-title-row')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Pending Deals</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{route('deals.index')}}">Deals</a>
                    </li>
                    <li class="breadcrumb-item active">Pending Deals</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('stats')
    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-account-plus bg-primary  text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Open Deals</h5>
                    </div>
                    <p class="text-muted mt-2 mb-0">Open </p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-thumb-up bg-success text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Closed Deal</h5>
                    </div>
                    <p class="text-muted mt-2 mb-0">Closed Tasks</p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-phone-missed bg-warning text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Missed Deal</h5>
                    </div>
                    <p class="text-muted mt-2 mb-0">Missed Tasks</p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-calendar-check bg-danger text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Deadline</h5>
                    </div>
                    <p class="text-muted mt-2 mb-0">Approaching</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Lead</th>
                    <th scope="col">Product</th>
                    <th scope="col">Status</th>
                    <th scope="col">Expectations</th>
                    <th scope="col" class="{{!Auth::user()->hasRole('Account') ? 'hide' : ''}}">Confirm Deal</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach($closed_deals as $deal)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$deal->lead->first_name}} {{$deal->lead->last_name}}</td>
                        <td>{{$deal->product->name}}</td>
                        <td>{{$deal->status->name}}</td>
                        <td>{{$deal->expectation}}</td>
                        <td class="{{!Auth::user()->hasRole('Account') ? 'hide' : ''}}">
                            <a class="btn btn-success confirm-deal" href="{{route('confirm', $deal->id)}}">Confirm</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection