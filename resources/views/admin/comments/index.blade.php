@extends('layouts.admin')

@section('content')
@if(count($comments) >0)
<h2>Comments</h2>
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Photo</th>

        <th>author</th>
        <th>email</th>
        <th>body</th>
        <th>status</th>
        <th>View-Post</th>
        <th>View-Reply</th>
        <th>Created</th>
        <th>Privialge</th>
        <th>Delete</th>
      </tr>
    </thead>
@foreach($comments as $comment)
    <tbody>
      <tr>
        <td>{{ $comment->id }}</td>
        <td><img src="{{ $comment->photo }}" height="64" /></td>
        <td>{{ $comment->author }}</td>
        <td>{{ $comment->email }}</td>
        <td>{{ $comment->body }}</td>
        <td>{{ $comment->is_active }}</td>
        <td><a href="{{ url('post/'.$comment->post->id) }}">view post</a></td>
        <td><a href="{{ url('comment/replies/'.$comment->id) }}">link reply</a></td>
        <td>{{ $comment->created_at->diffForHumans() }}</td>
        <td>
          @if($comment->is_active == 1)
            {!!Form::model($comment,['method'=>'PATCH','action'=>['PostsCommentsContoller@update',$comment->id]])!!}
                  <input type="hidden" name="is_active" value="0">
              {{ Form::submit('un-Approve',['class'=>'btn btn-success']) }}
            {!!Form::close()!!}
          @else
            {!!Form::model($comment,['method'=>'PATCH','action'=>['PostsCommentsContoller@update',$comment->id]])!!}
                 <input type="hidden" name="is_active" value="1">
              {{ Form::submit('Approve',['class'=>'btn btn-primary']) }}
            {!!Form::close()!!}
          @endif

        </td>
        <td>
          {!!Form::model($comment,['method'=>'DELETE','action'=>['PostsCommentsContoller@destroy',$comment->id]])!!}
            {{ Form::submit('delete',['class'=>'btn btn-danger']) }}
          {!!Form::close()!!}
        </td>

    </tbody>

      @endforeach
  </table>
  @else
  <h3>No Comments Found</h3>

  @endif
@endsection
