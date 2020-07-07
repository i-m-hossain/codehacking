

@extends('layouts.admin')


@section('content')


<h1>create users</h1>


    {!!Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store' , 'files'=>'true'])!!}
        <div class="form-group">

            {!! form::label('name', 'Name:') !!}
            {!! Form::text('name',null ,['class' => 'form-control']) !!}

        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email',null ,['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password',['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('file', 'Add Photo') !!}
            {!! Form::file('photo_id', null , ['class' => 'form-control']) !!}

        </div>
        <div class="form-group">
            {!! Form::label('role_id', 'User Role') !!}
            {!! Form::select('role_id', [''=>'Choose Options']+$roles, null , ['class' => 'form-control']) !!}

        </div>
        <div class="form-group">
            {!! Form::label('status', 'Status') !!}
            {!! Form::select('is_active',array(1=>'Active', 0=>'Not active'), 0 ,['class' => 'form-control']) !!}

        </div>
        <div class="form-group">
            {!! Form::submit('Create Users', ['class' => 'btn btn-primary']) !!}
        </div>

    {!! form::close() !!}


    @include('includes.form-error')



@stop
