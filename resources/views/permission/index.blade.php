@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Permission Management</h2>
            </div>
            <div class="pull-right">
                @can('role-create')
                    <a class="btn btn-success" href="{{ route('permission.create') }}"> Create New Perission </a>
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
            <th width="280px">Action</th>
        </tr>
        @foreach ($permission as $key => $data)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $data->name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('permission.show', $data->id) }}">Show</a>
                    @can('permission-edit')
                        <a class="btn btn-primary" href="{{ route('permission.edit', $data->id) }}">Edit</a>
                    @endcan
                    @can('permission-delete')
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['permission.destroy', $data->id],
                            'style' => 'display:inline',
                        ]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>

    {!! $permission->render() !!}
@endsection
