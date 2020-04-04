@extends('layouts.app')
@section('page-title-row')
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h4 class="page-title">Chat Summary</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="{{ route('leads.index') }}">Leads</a></li>
                <li class="breadcrumb-item"><a href="{{ route('leads.show', $lead_id) }}">Lead Deals</a></li>
                <li class="breadcrumb-item active">Chat Summary</li>
            </ol>
        </div>
    </div>
</div>
@endsection
@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('chats.store')}}">
        @csrf

        <div class="row">

            <input type="hidden" name="lead_id" value="{{ $lead_id }}">
            <input type="hidden" name="deal_id" value="{{ $deal_id  }}">
            <input type="hidden" name="user_id" value="{{ $user_id  }}">
            <input type="hidden" name="status" value=0>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Next Action:</strong>
                    <input class="form-control"  name="action"
                              value="{{old('action')}}" placeholder="Next Action" autofocus autocomplete="true" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Next Dated Step:</strong>
                    <input type="datetime-local" class="form-control" name="next_dated_step"
                           {{old('next_dated_step')}} autocomplete="true" value="{{old('next_dated_step')}}" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Summary:</strong>
                    <textarea class="form-control" style="height:150px" name="summary"
                              placeholder="Chat Summary" autocomplete="true">{{old('summary')}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

@endsection