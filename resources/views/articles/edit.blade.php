@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Article</h2>
        <form action="{{ route('articles.update', $article->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}">
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" id="content" name="content">{{ $article->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection