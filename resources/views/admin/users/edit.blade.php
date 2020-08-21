

@extends('layouts.admin')


@section('content')


    <h1>Update User</h1>
    <div class="row">
        <div class="col-sm-3">

            <img src="{{$user->photo ? $user->photo->file : 'https://via.placeholder.com/300'}}" alt="" class="img-responsive img-rounded">


        </div>
        <div class="col-sm-9">
            {!!Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id] , 'files'=>'true'])!!}
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
                    {!! Form::select('role_id', $roles, null , ['class' => 'form-control']) !!}

                </div>
                <div class="form-group">
                    {!! Form::label('status', 'Status') !!}
                    {!! Form::select('is_active',array(1=>'Active', 0=>'Not active'), null ,['class' => 'form-control']) !!}

                </div>
                <div class="form-group">
                    {!! Form::submit('Update User', ['class' => 'btn btn-primary col-sm-6']) !!}
                </div>

            {!! form::close() !!}

            {!!Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy',$user->id]])!!}

                <div class="form-group">`
                    {!! Form::submit('Delete User', ['class' => 'btn btn-danger col-sm-6 delete_btton'])!!}
                </div>

            {!! form::close() !!}


        </div>
    </div>
    <div class="row">
        @include('includes.form-error')
    </div>

@stop
