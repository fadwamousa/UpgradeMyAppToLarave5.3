@extends('layouts.admin')
@section('content')
<h3>All Media</h3>

<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
@if($photos)
@foreach($photos as $photo)
    <tbody>
      <tr>
        <td>{{ $photo->id }}</td>
        <td><img height="64" src="{{ $photo->file ? $photo->file : 'No Photo' }}"/></td>
        <td>{{ $photo->created_at->diffForHumans() }}</td>
        <td>{{ $photo->updated_at->diffForHumans() }}</td>
    </tbody>
@endforeach
@endif

  </table>
@endsection
