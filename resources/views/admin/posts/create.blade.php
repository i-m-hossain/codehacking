

@extends('layouts.admin')


@section('content')


    <h1>Create Post</h1>


    {!!Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store' , 'files'=>'true'])!!}

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null , ['class' => 'form-control']) !!}

        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Category:') !!}
            {!! Form::select('category_id',[''=>'Choose Category']+ $categories,null ,['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('file', 'Add Photo:') !!}
            {!! Form::file('photo_id', null , ['class' => 'form-control']) !!}

        </div>

        <div class="form-group">
            {!! Form::label('body', 'Description') !!}
            {!! Form::textarea('body', null , ['class' => 'form-control']) !!}

        </div>




        <div class="form-group">
            {!! Form::submit('Create Posts', ['class' => 'btn btn-primary']) !!}
        </div>

    {!! form::close() !!}


    @include('includes.form-error')



@stop
