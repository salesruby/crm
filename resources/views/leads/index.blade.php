@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Leads</h2>
            </div>
            <div class="pull-right">
                @can('lead-create')
                    <a class="btn btn-success" href="{{ route('leads.create') }}"> Create New Lead</a>
                @endcan
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
            {{--<th>Details</th>--}}
            <th width="280px">Action</th>
        </tr>
        @foreach ($leads as $lead)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $lead->first_name }} {{ $lead->last_name }}</td>
                {{--<td>{{ $lead->detail }}</td>--}}
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


    <p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection