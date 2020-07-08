@extends('layouts.admin')


@section('content')

    <h1>users</h1>
    <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
              <th>Photo</th>
            <th>User Role</th>
            <th>Status</th>
            <th>Email</th>
            <th>Created at</th>
            <th>Updated at</th>

          </tr>
        </thead>
        <tbody>

        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <td><img height="50" src="{{$user->photo ? $user->photo->file: 'https://via.placeholder.com/300'}}" alt="this is an iamge"></td>   {{-- see Photo.php model where an accessor is used to get this diectory '/images/...'--}}
                    <td>{{$user->role ? $user->role->name: 'user has no role'}}</td> {{--if user role exist echo 'user role name' or echo 'user has no role'--}}
                    <td>{{$user->is_active ? "Active": "Not active"}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif

        </tbody>
      </table>


@stop

