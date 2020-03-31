@extends('layouts.app')
@section('page-title-row')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">All Statuses</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Statuses</a>
                    </li>
                    <li class="breadcrumb-item active">All Status</li>
                </ol>
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

    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Details</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($statuses as $status)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $status->name }}</td>
                    <td>{{ $status->description }}</td>
                    <td>
                        <form action="{{ route('statuses.destroy',$status->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('statuses.show',$status->id) }}">Show</a>
                            @can('product-edit')
                                <a class="btn btn-primary" href="{{ route('statuses.edit',$status->id) }}">Edit</a>
                            @endcan


                            @csrf
                            @method('DELETE')
                            @can('status-delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    {!! $statuses->links() !!}

@endsection
