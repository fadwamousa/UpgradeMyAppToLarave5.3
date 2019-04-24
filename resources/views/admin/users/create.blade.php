@extends('layouts.admin')
@section('content')
<h3>Create User</h3>
{!!Form::open(['method'=>'POST','action'=>'AdminUsersController@store','files'=>true])!!}
<div class="form-group">

  {{ Form::label('name','Name') }}
  {{ Form::text('name',null,['class'=>'form-control']) }}

</div>
<div class="form-group">

  {{ Form::label('email','Email') }}
  {{ Form::text('email',null,['class'=>'form-control']) }}

</div>
<div class="form-group">

  {{ Form::label('password','Password') }}
  {{ Form::password('password',['class'=>'form-control']) }}

</div>
<div class="form-group">

  {{ Form::label('role_id','Role') }}
  {{ Form::select('role_id',['' => 'Choose An Option']+$roles,null,['class'=>'form-control']) }}

</div>
<div class="form-group">

  {{ Form::label('is_Active','Status') }}
  {{ Form::select('is_Active',[''=>'Choose Status',1=>'Active',2=>'No-Active'],null,['class'=>'form-control']) }}

</div>
<div class="form-group">

  {{ Form::label('photo_id','Photo') }}
  {{ Form::file('photo_id',null,['class'=>'form-control']) }}

</div>
<div class="form-group">

  {{ Form::submit('send',['class'=>'btn btn-primary']) }}

</div>
{!!Form::close()!!}
@endsection
