@extends('layouts.app')

@section('content')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="page-title-box">
        <div class="row">
            <h5 class="col-sm-11">
                Add New Lead
            </h5>
            <span class="pull-right">
                <a class="btn btn-primary" href="{{ route('leads.index') }}"> Back</a>
            </span>
        </div>
    </div>

    <!-- end row -->
    <!-- end page-title -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('leads.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="first_name" class="form-control" placeholder="First Name"
                           value="{{old("first_name")}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name"
                           value="{{old("last_name")}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" class="form-control" placeholder="Email"
                           value="{{old("email")}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Phone:</strong>
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number"
                           value="{{old("phone")}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Company Name:</strong>
                    <input type="text" name="company_name" class="form-control" placeholder="Company Name"
                           value="{{old("company_name")}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Lead Designation:</strong>
                    <input type="text" name="lead_designation" class="form-control"
                           placeholder="Lead Designation" value="{{old("lead_designation")}}">
                </div>
            </div>

            @if(Auth::user()->hasRole('Admin'))
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Sales Rep</strong>
                        <select name="sales_rep_id">
                            @foreach($rep as $sales_rep)
                                <option value={{$sales_rep->id}}>{{$sales_rep->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @else
                {{--<div class="col-xs-12 col-sm-12 col-md-6">--}}
                {{--<div class="form-group">--}}
                {{--<strong>Sales Rep : {{Auth::user()->name}}</strong>--}}
                <input type="hidden" name="sales_rep_id" value="{{Auth::user()->id}}" class="form-control">
                {{--</div>--}}
                {{--</div>--}}
            @endif

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Expectation:</strong>
                    <input class="form-control" type="number" name="expectation" value="{{old("expectation")}}"
                           placeholder="Enter Deal Expectation">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Next Dated Step:</strong>
                    <input class="form-control" type="date" name="next_dated_step"
                           value="{{old("next_dated_step")}}" placeholder="Next Dated Step">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Product</strong>
                    <select name="product">
                        @foreach($products as $product)
                            <option value={{$product->id}}>{{$product->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 ">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

@endsection