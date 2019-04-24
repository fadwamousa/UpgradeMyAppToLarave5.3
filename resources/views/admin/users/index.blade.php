@extends('layouts.admin')
@section('content')
<h3>All Users</h3>

<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
@if(count($users) > 0)
@foreach($users as $user)
    <tbody>
      <tr>
        <td>{{ $user->id }}</td>

        <td><a href="{{ url('/admin/users/'.$user->id.'/edit') }}">{{ $user->name }}</a></td>
        <td><img  height="50" src="{{ $user->photo ? $user->photo->file : 'No Photo' }}" /></td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role->name }}</td>
        <td>{{ $user->is_Active == 1 ? 'Active' : 'NoActive'}}</td>
        <td>{{ $user->created_at->diffForHumans() }}</td>
        <td>{{ $user->updated_at->diffForHumans() }}</td>
    </tbody>
@endforeach
@endif
  </table>
@endsection
