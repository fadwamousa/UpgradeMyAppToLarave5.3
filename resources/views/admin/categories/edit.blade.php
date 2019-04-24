@extends('layouts.admin')
@section('content')

<div class="col-sm-6">

  {!!Form::model($category,['method'=>'PATCH','action'=>['AdminCategoriesController@update',$category->id],'files'=>true])!!}
  <div class="form-group">

    {{ Form::label('name','name') }}
    {{ Form::text('name',$category->name,['class'=>'form-control']) }}

  </div>
  <div class="form-group">

    {{ Form::submit('update',['class'=>'btn btn-info']) }}

  </div>
  {!!Form::close()!!}

  {!!Form::model($category,['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id],'files'=>true])!!}
  <div class="form-group">

    {{ Form::submit('delete',['class'=>'btn btn-danger']) }}

  </div>
  {!!Form::close()!!}

</div>



  @endsection

</div>
