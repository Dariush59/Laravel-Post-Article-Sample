@extends('layout')


@section('content')

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{ $article->title }}</h1>

    <!-- Author -->
    <p class="lead">
       Posted by <a href="index.php">{{ $article->user->name }}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Sent in  {{  $article->created_at }}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="http://placehold.it/900x300" alt="">

    <hr>

    <!-- Post Content -->
    {!! $article->body !!}
    <hr>

    <!-- Blog Comments -->

        <!-- Comments Form -->
    <div class="well">
        @include('layouts.errors')
                <!-- Comment -->
        @if(auth()->check())
            <h4>Sent comments</h4>
            <hr>
            <form role="form" action="{{ route('comment.store' , ['article' => $article->slug ]) }}" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="title">Texts </label>
                    <textarea class="form-control" name="body" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        @else
            <a href="/register">To sens a comment you need to be a member.</a>
        @endif

    </div>

    <hr>

    <!-- Posted Comments -->
    @foreach($comments as $comment)
        <div class="media">
            <div class="media-body">
                <h4 class="media-heading">{{ $comment->user->name }}
                    <small>Sent in {{  jdate($article->created_at)->format('%B %d، %Y') }}</small>
                </h4>
                {{ $comment->body }}
            </div>
        </div>
    @endforeach
@endsection