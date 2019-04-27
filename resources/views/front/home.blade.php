@extends('layouts.blog_home')

@section('content')
<div class="row">



    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="page-header">

            <small>Secondary Text</small>
        </h1>
        @if(count($posts) > 0)
        @foreach($posts as $post)

        <!-- First Blog Post -->
        <h2>
            <a href="#">{{ $post->title }}</a>
        </h2>
        <p class="lead">
            by <a href="index.php">{{ $post->user->name }}</a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at }}</p>
        <hr>
        <img class="img-responsive" src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/900x300'}}" alt="">
        <hr>
        <p>{{str_limit($post->body,50)}}</p>
        <a class="btn btn-primary" href="{{ url('post/'.$post->id) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>
        @endforeach
        @endif



        <!-- pagination -->

        <div class="row">
          <div class="col-sm-6 col-sm-offset-5">

              {{ $posts->render() }}

          </div>

        </div>


    </div>

    <!-- Blog Sidebar Widgets Column -->
@include('inc.front_sidebar')

</div>
<!-- /.row -->
@endsection
