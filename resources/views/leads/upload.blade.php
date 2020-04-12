@extends('layouts.app')
@section('page-title-row')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Add Lead</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{ route('leads.index') }}">Leads</a>
                    </li>
                    <li class="breadcrumb-item active">Add Lead</li>
                </ol>
            </div>
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


    <form action="{{ route('leads.upload.post') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row" style="display: flex; justify-content: center;">
            <div class="col-md-offset-3 col-md-6" >
                <div class="card dashboard-card " style="min-height: 250px;">
                    <div class="dashboard-title text-center">
                        <h6>Your leads are in a spreadsheet?</h6>
                        Import them all into Leads Management
                    </div>
                    <div class="text-center"><span class="mdi mdi-file-excel"></span></div>
                    <div class="form-group text-center">
                        <div class="col-md-12">
                        <input type="file" name="file" class="form-control"/>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection
