@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h5>Leads</h5>
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
            <th width="280px">Action</th>
        </tr>
        @foreach ($leads as $lead)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $lead->first_name }} {{ $lead->last_name }}</td>
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
    </table>


    {!! $leads->links() !!}
@endsection