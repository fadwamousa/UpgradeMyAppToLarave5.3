@extends('layouts.admin')
@section('content')
<h3>All Media</h3>
{!!Form::open(['method'=>'POST','action'=>'AdminMediasController@deleteMedia','class'=>'form-inline'])!!}
{{ csrf_field() }}
{{ method_field('DELETE') }}
<div class="form-group">

  <select class="form-control" name="checkBoxArray" >

    <option value="delete">delete</option>

  </select>

</div>
<div class="form-group">

  <input type="submit" class="btn btn-primary"/>

</div>
<table class="table">
    <thead>
      <tr>
        <th><input type="checkbox" id="options" /></th>
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
        <td><input class="checkboxs" type="checkbox" name="checkBoxArray[]" value="{{ $photo->id }}" /></td>
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

</table>
{!!Form::close()!!}

@endif

@endsection

@section('scripts')
      <script >

          $(document).ready(function(){
              $('#options').click(function(){

                if(this.checked){
                  $('.checkboxs').each(function(){

                    this.checked = true;

                  });
                }else{

                  $('.checkboxs').each(function(){

                    this.checked = false;

                  });

                }

              });
          });

      </script>
@endsection
