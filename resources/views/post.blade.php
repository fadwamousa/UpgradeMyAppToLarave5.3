@extends('layouts.blog_post')
@section('content')
<h3>Post Blog Here </h3>


<!-- Title -->
<h1>{{ $post->title }}</h1>

<!-- Author -->
<p class="lead">
    by <a href="#">{{ $post->user->name }}</a>
</p>

<hr>

<!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span>{{ $post->created_at->diffForHumans() }}</p>

<hr>

<!-- Preview Image -->

<img class="img-responsive" src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/900x300' }}" alt="">

<hr>

<!-- Post Content -->
<p class="lead">{{ $post->body }}</p>

<hr>

<!-- Blog Comments -->
@if(Auth::check())
<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
    {!!Form::open(['method'=>'POST','action'=>'PostsCommentsContoller@store'])!!}
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <div class="form-group">
        <textarea name="body" class="form-control" rows="3"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

    {!!Form::close()!!}
</div>

@endif
<hr>

<!-- Posted Comments -->

@if(count($comments) > 0)
@foreach($comments as $comment)
<!-- Comment -->
<div class="media">
    <a class="pull-left" href="#">

        <img class="media-object" height="64" src="{{ $comment->photo ? $comment->photo : 'http://placehold.it/64x64' }}" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">{{$comment->author}}
            <small>{{ $comment->created_at->diffForHumans() }}</small>
        </h4>
        {{ $comment->body }}
        <!-- Nested Comment -->
        @if(count($comment->replies) > 0)
        @foreach($comment->replies as $reply)
        <div class="media">
            <a class="pull-left" href="#">

                <img class="media-object" height="64" src="{{ $reply->photo ? $reply->photo : 'http://placehold.it/64x64' }}" alt="">

            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$reply->author}}
                    <small>{{ $reply->created_at->diffForHumans() }}</small>
                </h4>
              {{ $reply->body }}
        </div>
        @endforeach
        @endif

        <br>
        <br>
  {!!Form::open(['method'=>'POST','action'=>'CommentsRepliesController@createReply'])!!}
  <input type="hidden" name="comment_id" value="{{ $comment->id }}">
  <div class="form-group">
      <textarea name="body" class="form-control" rows="3"></textarea>
  </div>
  <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  {!!Form::close()!!}

        </div>
        @endforeach
        @endif
        <!-- End Nested Comment -->
    </div>
  </div>
@endsection
