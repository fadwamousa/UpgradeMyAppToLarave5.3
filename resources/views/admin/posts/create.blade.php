@extends('layouts.admin')
@section('content')
<h3>Create Post</h3>
{!!Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=>true])!!}
<div class="form-group">

  {{ Form::label('title','Title') }}
  {{ Form::text('title',null,['class'=>'form-control']) }}

</div>
<div class="form-group">

  {{ Form::label('body','Body') }}
  {{ Form::textarea('body',null,['class'=>'form-control']) }}

</div>

<div class="form-group">

  {{ Form::label('photo_id','Photo') }}
  {{ Form::file('photo_id',null,['class'=>'form-control']) }}

</div>
<div class="form-group">

  {{ Form::label('category_id','Category') }}
  {{ Form::select('category_id',[''=>'Choose Category']+$categories,null,['class'=>'form-control']) }}

</div>

<div class="form-group">

  {{ Form::submit('send',['class'=>'btn btn-primary']) }}

</div>
{!!Form::close()!!}
@endsection
