@extends('templates.default')

@section('content')
<div class="tile">
<form class="" action="{{ route('article.update', $article) }}" method="POST">
    @csrf
    @method("PUT")

<div class="row">
    <div class="col-md-12">
     
        <h3 class="tile-title">Edit Content</h3>
        <div class="tile-body">
         
            <div class="form-group">
              <label class="control-label">Title</label>
            <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" value="{{ old('title') ?? $article->title }}" placeholder="Title">
              @if ($errors->has('title'))
                <div class="form-control-feedback">{{ $errors->first('title')}}</div>
              @endif
            </div>
            <div class="form-group">
              <label class="control-label">Content</label>
              <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="" rows="5" cols="30" placeholder="Write your content here...">{{ old('content') ?? $article->content }}</textarea>
              @if ($errors->has('content'))
                <div class="form-control-feedback">{{ $errors->first('content')}}</div>
              @endif
            </div>

            <div class="tile-footer">
                <input class="btn btn-primary" type="submit" value="Update">
            </div>
@endsection