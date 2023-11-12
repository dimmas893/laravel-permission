@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Role</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('permission.index') }}"> Back </a>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Something went wrong.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['route' => 'permission.store', 'method' => 'POST']) !!}
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Name Permission:</strong>
                {!! Form::text('name', null, ['placeholder' => 'Name permission', 'class' => 'form-control']) !!}
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </div>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2">
        </div>
    </div>
    {!! Form::close() !!}

@endsection
