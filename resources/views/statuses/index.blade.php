@extends('layouts.app')


@section('content')
    <div class="page-title-box">
        <div class="row">
            <div class="col-sm-12">
                <h5>Manage Status</h5>
            </div>
        </div>
    </div>



    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
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


    {!! $statuses->links() !!}

@endsection
