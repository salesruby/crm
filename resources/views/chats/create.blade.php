@extends('layouts.app')

@section('content')

    <div class="page-title-box">
        <div class="row">
            <h5 class="col-sm-11 ">Chat summary with <strong>{{$user->name}}</strong></h5>
            <span class="pull-right">
                <a class="btn btn-primary" href="{{ route('leads.index') }}"> Back</a>
            </span>
        </div>
    </div>

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

            <input type="hidden" name="user_id" value="{{ $user->id  }}">
            <input type="hidden" name="lead_id" value="{{ $id }}">


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Summary:</strong>
                    <textarea class="form-control" style="height:150px" name="summary"
                              placeholder="Chat Summary" autofocus autocomplete="true">{{old('summary')}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>


    </form>


@endsection