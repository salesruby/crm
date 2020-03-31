@extends('layouts.app')

@section('page-title-row')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Leads</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Leads</a>
                    </li>
                    <li class="breadcrumb-item active">All Leads</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- end page-title -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">S/N</th>
                <th scope="col">Lead</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($leads as $lead)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $lead->first_name }} {{ $lead->last_name }}</td>
                    <td>{{ $lead->email}}</td>
                    <td>

                        <form action="{{ route('leads.destroy',$lead->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('leads.show',$lead->id) }}">Show</a>
                            @can('lead-edit')
                                <a class="btn btn-primary" href="{{ route('leads.edit',$lead->id) }}">Edit</a>
                            @endcan

                            @csrf
                            @method('DELETE')
                            @can('lead-delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    {!! $leads->links() !!}
@endsection
