@extends('templates.layout')

@section('content')
     <!-- Page Content -->
  <div class="container">

      <div class="row">
  
        <!-- Blog Entries Column -->
        <div class="col-md-8">
  
          <h1 class="my-4">Post</h1>
          <hr>
        
          @foreach ($articles as $article)
          <!-- Blog Post -->
          <div class="card mb-4">
            {{-- @foreach ($articles as $article) --}}
              <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
              <div class="card-body">
                <h2 class="card-title">{{$article->title}}</h2>
                <p class="card-text">{{$article->content}}</p>
                <a href="{{route('main.show', $article)}}" class="btn btn-primary">Read More &rarr;</a>
              </div>
              <div class="card-footer text-muted">
                {{$article->created_at->diffForHumans()}}
                <a href="#">{{$article->user->name}}</a>
              </div>
          </div>
          @endforeach
  
  
          <!-- Pagination -->
          {{ $articles->links() }}
  
        </div>
  
        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
  
          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>
  
        </div>
      </div>
  
    </div>
    <!-- /.container -->
@endsection



 

