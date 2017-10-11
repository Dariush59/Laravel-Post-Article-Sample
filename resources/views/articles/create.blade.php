@extends('layout')

@section('content')

    <h1 class="page-header">
       Send an article
    </h1>

    @include('layouts.errors')

    <form action="{{ route('article.store') }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="title">Title: </label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Please insert the title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="category">Categories: </label>
            <select name="category[]" class="form-control" id="category" title="Please choose your category" multiple>
                @foreach( $categories as $id => $name )
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="body">Text:</label>
            <textarea class="form-control" name="body" id="body" placeholder="Please insert the text" rows="7">{{ old('body') }}</textarea>
        </div>
        <button type="submit" class="btn btn-default">Send</button>
    </form>

@endsection

@section('styles')
    <link href="/css/bootstrap-select.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="/js/bootstrap-select.min.js"></script>

    <script>
        $('#category').selectpicker();
    </script>
@endsection