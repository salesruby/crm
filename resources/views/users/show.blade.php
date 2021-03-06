@extends('layouts.app')

@section('page-title-row')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">{{$user->name}}'s Details</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a>
                    </li>
                    <li class="breadcrumb-item active">{{$user->name}} Details</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('stats')
    <div class="row">
        <div class="col-sm-6 col-xl-6">
            <div class="card user-card">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $user->name }}
                </div>


                <div class="form-group">
                    <strong>Email:</strong>
                    {{ $user->email }}
                </div>

                <div class="form-group">
                    <strong>Roles:</strong>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card user-card">
                <div class="form-group">
                    <strong>Generated Revenue:</strong>
                    {{$generated_revenue}}
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card user-card">
                <div class="form-group">
                    <strong>Total expectation:</strong>
                    {{$total_expectation}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
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
                </tr>
                </thead>
                <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach($deals as $deal)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$deal->lead->first_name}} {{$deal->lead->last_name}}</td>
                        <td>{{$deal->product->name}}</td>
                        <td>{{$deal->status->alias}} -> {{$deal->status->name}}</td></td>
                        <td>{{$deal->expectation}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection