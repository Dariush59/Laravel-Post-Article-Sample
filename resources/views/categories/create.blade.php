@extends('layout')

@section('content')

    <h1 class="page-header">
       Add a Category
    </h1>

    @include('layouts.errors')

    <form action="{{ route('category.store') }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="name">Category name: </label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Please insert the category name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="slug">Slug: </label>
            <input type="text" name="slug" class="form-control" id="slug" placeholder="Please insert the slug" value="{{ old('slug') }}">
        </div>

        <button type="submit" class="btn btn-default">Add</button>
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