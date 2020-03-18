@extends('layouts.app')

@section('content')
    <div class="page-title-box">
        <div class="row">
            <h5 class="col-sm-12">
                Manage Lead
            </h5>
        </div>
        <!-- end row -->
    </div>
    <!-- end page-title -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th scope="col">S/N</th>
                <th scope="col">Lead</th>
                <th scope="col">Product</th>
                <th scope="col">Deal Status</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($leads as $lead)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $lead->first_name }} {{ $lead->last_name }}</td>
                    <td>{{\App\Product::find($lead->product)->name}}</td>
                    <td>
                        @if(count($lead->statuses) > 0)
                            {{$lead->statuses[0]->name}}
                        @endif
                    </td>

                    <td>

                        <form action="{{ route('leads.destroy',$lead->id) }}" method="POST">
                            <a class="btn btn-warning" href="{{ route('chats.form',$lead->id) }}">Chat</a>
                            <a class="btn btn-info" href="{{ route('leads.show',$lead->id) }}">Show</a>
                            <a class="btn btn-default" href="{{ route('lead_status.form',$lead->id) }}">Status</a>
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