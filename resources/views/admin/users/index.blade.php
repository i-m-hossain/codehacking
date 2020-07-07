@extends('layouts.admin')


@section('content')

    <h1>users</h1>
    <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
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
                    <td>{{$user->name}}</td>
                    <td>{{$user->role->name}}</td>
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

