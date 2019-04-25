@extends('layouts.admin')
@section('content')
<h3>All Posts</h3>

<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>photo</th>
        <th>title</th>
        <th>body</th>
        <th>Author</th>
        <th>Category</th>
        <th>post Link</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
@if(count($posts) >0)
@foreach($posts as $post)
    <tbody>
      <tr>
        <td>{{ $post->id }}</td>
        <td><img height="64" src="{{ $post->photo ? $post->photo->file : 'No Photo Found' }}"/></td>
        <td><a href="{{ url('admin/posts/'.$post->id.'/edit') }}">{{ $post->title }}</a></td>
        <td>{{ $post->body }}</td>
        <td>{{ $post->user->name }}</td>
        <td>{{ $post->category->name }}</td>
        <td><a href="{{ url('post/'.$post->id) }}">Post</a></td>
        <td><a href="{{ url('admin/comments/'.$post->id) }}">comment</a></td>
        <!--Show comment for specific to post -->
        <td>{{ $post->created_at->diffForHumans() }}</td>
        <td>{{ $post->updated_at->diffForHumans() }}</td>

    </tbody>
@endforeach
@endif
  </table>
@endsection
