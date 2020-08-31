@extends('layouts.admin');

@section('content')
    @if(count($comments)>0)

        <h1>Comments</h1>

        <table class="table">
            <thead>
            <tr>
                <th>id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Photo</th>
                <th>Body</th>
                <th></th>

            </tr>
            </thead>
            @foreach($comments as $comment)
                <tbody>
                <tr>
                    <td>{{$comment->id}}</td>

                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td><img height="50" width="50" src="{{$comment->photo}}" alt="" ></td>
                    <td>{{$comment->body}}</td>

                    <td><a href="{{route('home.post', $comment->post->slug)}}">View post</a></td>
                    <td>
                        @if($comment->is_active==0)
                            {!!Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update',$comment->id]])!!}
                            <input type="hidden" name="is_active"  value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve ', ['class' => 'btn btn-success'])!!}
                            </div>
                            {!! Form::close() !!}
                        @else
                            {!!Form::open(['method' => 'PATCH', 'action' => ['PostCommentsController@update',$comment->id]])!!}
                            <input type="hidden" name="is_active"  value="0">
                            <div class="form-group">
                                {!! Form::submit('Un-Approve ', ['class' => 'btn btn-info'])!!}
                            </div>

                            {!! form::close() !!}
                        @endif
                    </td>
                    <td>
                        {!!Form::open(['method' => 'DELETE', 'action' => ['PostCommentsController@destroy',$comment->id]])!!}

                        <div class="form-group">
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger'])!!}
                        </div>

                        {!! form::close() !!}
                    </td>


                </tr>
                </tbody>
            @endforeach
        </table>

    @else
        <h1 class="text-center">No comments</h1>
    @endif




@stop
