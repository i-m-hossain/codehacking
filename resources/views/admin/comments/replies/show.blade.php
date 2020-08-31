@extends('layouts.admin');

@section('content')
    @if(count($replies)>0)

        <h1>Replies</h1>

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
            @foreach($replies as $reply)
                <tbody>
                <tr>
                    <td>{{$reply->id}}</td>

                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
{{--                    <td><img height="50" width="50" src="{{$reply->photo}}" alt="" ></td>--}}
                    <td>{{$reply->body}}</td>

                    <td><a href="{{route('home.post', $reply->comment->post->id)}}">View post</a></td>
                    <td>
                        @if($reply->is_active==0)
                            {!!Form::open(['method' => 'PATCH', 'action' => ['CommentRepliesController@update',$reply->id]])!!}
                            <input type="hidden" name="is_active"  value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve ', ['class' => 'btn btn-success'])!!}
                            </div>
                            {!! Form::close() !!}
                        @else
                            {!!Form::open(['method' => 'PATCH', 'action' => ['CommentRepliesController@update',$reply->id]])!!}
                            <input type="hidden" name="is_active"  value="0">
                            <div class="form-group">
                                {!! Form::submit('Un-Approve ', ['class' => 'btn btn-info'])!!}
                            </div>

                            {!! form::close() !!}
                        @endif
                    </td>
                    <td>
                        {!!Form::open(['method' => 'DELETE', 'action' => ['CommentRepliesController@destroy',$reply->id]])!!}

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
        <h1 class="text-center">No replies</h1>
    @endif




@stop
