@extends('layouts.admin')
@section('content')
<h3>Edit Post</h3>
{!!Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true])!!}
<div class="form-group">

  {{ Form::label('title','Title') }}
  {{ Form::text('title',$post->title,['class'=>'form-control']) }}

</div>
<div class="form-group">

  {{ Form::label('body','Body') }}
  {{ Form::textarea('body',$post->body,['class'=>'form-control']) }}

</div>

<div class="form-group">

  {{ Form::label('photo_id','Photo') }}
  {{ Form::file('photo_id',null,['class'=>'form-control']) }}

</div>
<div class="form-group">

  {{ Form::label('category_id','Category') }}
  {{ Form::select('category_id',$categories,null,['class'=>'form-control']) }}

</div>

<div class="form-group">

  {{ Form::submit('update',['class'=>'btn btn-info']) }}

</div>
{!!Form::close()!!}
{!!Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id],'files'=>true])!!}
{{ Form::submit('delete',['class'=>'btn btn-danger']) }}
{!!Form::close()!!}
@endsection
