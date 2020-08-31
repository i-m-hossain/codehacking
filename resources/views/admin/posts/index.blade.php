@extends('layouts.admin')


@section('content')
    <h1>Posts</h1>
    <table class="table">
        <thead>
          <tr>
            <th>id</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Photo </th>
            <th>Title</th>
            <th>Body</th>
            <th>Created </th>
            <th>Updated </th>
          </tr>
        </thead>
        <tbody>
         @if($posts)
             @foreach($posts as $post)
                  <tr>
                    <td>{{$post->id}}</td>
                    <td><a href="{{route('posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
                    <td>{{$post->category ? $post->category->name : 'uncategorized' }}</td>
                    <td><img height="50" width="50" src="{{$post->photo ? $post->photo->file: 'https://via.placeholder.com/300'}}" alt="this is an iamge"></td>
{{--                    <td>{{$post->photo_id}}</td>--}}
                    <td>{{$post->title}}</td>
                    <td>{{Str::limit($post->body,20)}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <td><a href="{{route('comments.show',$post->id)}}">view comments</a></td>
{{--                    <td><a href="{{route('home.post', $post->id)}}">View Post</a></td>--}}
                    <td><a href="{{route('home.post', $post->slug )}}">View Post</a></td> {{--using slug instead of post id because slug is also unique by nature and also it gives pretty url --}}


                  </tr>
             @endforeach
          @endif

        </tbody>
      </table>

{{--      For pagination purpose  --}}

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
{{--            {{$posts->links()}}--}}
            {{$posts->render()}}
        </div>
    </div>

@stop
