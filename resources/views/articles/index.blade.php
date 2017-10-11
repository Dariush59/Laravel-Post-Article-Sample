@extends('layout')

@section('content')

    @if($message = session('message'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <h1 style="display: inline" class="page-header">
       Articles
    </h1>
    <a href="/article/create"> <i style="display: inline"> New</i> </a>
    <!-- First Blog Post -->
    @foreach( $articles as $article )

        <div>
            <h2>
                <a href="{{ route('article.show' , ['article' => $article->slug ]) }}">{{ $article->title }}</a>
                @if(auth()->check())
                    <small><a style="color: #999;" href="{{ route('article.edit' , ['article' => $article->slug ]) }}">Edit</a></small>
                @endif
            </h2>
            <p class="lead">
                Posted by <a href="index.php">{{ $article->user->name }}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span>Posted in  {{ $article->created_at }}</p>
            <ul>
                @foreach( $article->categories()->pluck('name') as $cate)
                    <li><a href="/article/category/{{ $cate }}">{{ $cate }}</a></li>
                @endforeach
            </ul>
            <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <p>{!! $article->body !!}</p>
            <a class="btn btn-primary" href="{{ route('article.show' , ['article' => $article->slug ]) }}">more <span class="glyphicon glyphicon-chevron-left"></span></a>
        </div>

        @if(! $loop->last )
            <hr>
        @endif

    @endforeach


    <!-- Pager -->
    <div style="text-align:center;">
        {!! $articles->render() !!}
    </div>

@endsection