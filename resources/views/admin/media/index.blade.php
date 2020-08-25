@extends('layouts.admin')


@section('content')

    <h1>Media</h1>
    @if($photos)
        <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>

              </tr>
            </thead>
            @foreach($photos as $photo)
                <tbody>
                  <tr>
                    <td>{{$photo->id}}</td>
                    <td><img src="{{$photo->file}}" alt="" width="50" height="50" ></td>
                    <td>{{$photo->created_at ? $photo->created_at : 'No date'}}</td>
                    <td>

                            {!!Form::model($photo,['method' => 'DELETE', 'action' => ['AdminMediasController@destroy',$photo->id]])!!}

                                <div class="form-group">
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                </div>
                            {!! Form::close() !!}
                  </tr>
                </tbody>
            @endforeach
          </table>
    @endif



    @stop
