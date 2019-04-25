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
        <th>Delete</th>
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
        <td>
          {!!Form::open(['method'=>'DELETE','action'=>['AdminMediasController@destroy',$photo->id],'files'=>true,'class'=>'dropzone'])!!}
             <div class="form-group">

               {{ Form::submit('delete',['class'=>'btn btn-danger']) }}

             </div>
          {!!Form::close()!!}
        </td>

    </tbody>
@endforeach
@endif

  </table>
@endsection
