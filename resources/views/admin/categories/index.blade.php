@extends('layouts.admin')
@section('content')

<div class="col-sm-6">

  {!!Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store','files'=>true])!!}
  <div class="form-group">

    {{ Form::label('name','name') }}
    {{ Form::text('name',null,['class'=>'form-control']) }}

  </div>


  <div class="form-group">

    {{ Form::submit('send',['class'=>'btn btn-info']) }}

  </div>
  {!!Form::close()!!}

</div>
<div class="col-sm-6">

  <h3>All categories</h3>

  <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>name</th>
          <th>Created</th>
          <th>Updated</th>
        </tr>
      </thead>
  @if(count($categories) >0)
  @foreach($categories as $category)
      <tbody>
        <tr>
          <td>{{ $category->id }}</td>
          <td><a href="{{ url('admin/categories/'.$category->id.'/edit') }}">{{ $category->name }}</a></td>
          <td>{{ $category->created_at->diffForHumans() }}</td>
          <td>{{ $category->updated_at->diffForHumans() }}</td>

      </tbody>
  @endforeach
  @endif
    </table>
  @endsection

</div>
