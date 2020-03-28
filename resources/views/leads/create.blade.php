@extends('layouts.app')
@section('page-title-row')
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
@endsection

@section('content')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->


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
                    <strong>Designation:</strong>
                    <input type="text" name="designation" class="form-control"
                           placeholder="Designation" value="{{old("designation")}}">
                </div>
            </div>

            @if(Auth::user()->hasRole('Admin'))
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="form-group">
                        <strong>Sales Rep</strong>
                        <select name="user_id">

                            @foreach($users as $user)
                                <option value={{$user->id}}>{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @else
                {{--<div class="col-xs-12 col-sm-12 col-md-6">--}}
                {{--<div class="form-group">--}}
                {{--<strong>Sales Rep : {{Auth::user()->name}}</strong>--}}
                <input type="hidden" name="user_id" value={{$authenticated_user->id}} class="form-control">
                {{--</div>--}}
                {{--</div>--}}
            @endif

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <strong>Product Name:</strong>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <strong>Product Expectation:</strong>
                    </div>
                </div>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <label>
                                <input name="product_ids[]" value={{$product->id}} type="checkbox" />
                                {{$product->name}}
                            </label>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <span>{{$product->price}}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- </div>
                <div class="form-group">
                    <strong>Product:</strong>
                    @foreach($products as $product)
                        <div class="col-xs-12 col-sm-12 col-md-6">
                        </div>
                    @endforeach
                    <input class="form-control" type="number" name="expectation" value="{{old("expectation")}}"
                           placeholder="Enter Deal Expectation">
                </div>
            </div> -->

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Next Dated Step:</strong>
                    <input class="form-control" type="datetime-local" name="next_dated_step"
                           value="{{old("next_dated_step")}}" placeholder="Next Dated Step">
                </div>
            </div>

            <!-- <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Product</strong>
                    <select name="product_id[]" multiple>
                        @foreach($products as $product)
                            <option value={{$product->id}}>{{$product->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div> -->

            <div class="col-xs-12 col-sm-12 col-md-4 ">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection