@extends('layouts.admin')
@section('content')
  <h3>Edit User</h3>
  <div class="col-sm-3">

    <img class="img-responsive img-rounded" src="{{ $user->photo ? $user->photo->file : 'No Photo' }}" />

  </div>

  <div class="col-sm-9">

    {!!Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true])!!}
    <div class="form-group">

      {{ Form::label('name','Name') }}
      {{ Form::text('name',$user->name,['class'=>'form-control']) }}

    </div>
    <div class="form-group">

      {{ Form::label('email','Email') }}
      {{ Form::text('email',$user->email,['class'=>'form-control']) }}

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
      {{ Form::select('is_Active',[1=>'Active',0=>'No-Active'],null,['class'=>'form-control']) }}

    </div>
    <div class="form-group">

      {{ Form::label('photo_id','Photo') }}
      {{ Form::file('photo_id',null,['class'=>'form-control']) }}

    </div>
    <div class="form-group">

      {{ Form::submit('edit',['class'=>'btn btn-primary']) }}

    </div>
    {!!Form::close()!!}

    {!!Form::model($user,['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id],'files'=>true])!!}

    <div class="form-group">

      {{ Form::submit('DELETE',['class'=>'btn btn-danger']) }}

    </div>
    {!!Form::close()!!}

  </div>

@endsection
