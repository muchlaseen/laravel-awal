@extends('templates.layout')

@section('content')
     <!-- Page Content -->
  <div class="container">

      <div class="row">
  
        <!-- Blog Entries Column -->
        <div class="col-md-8">
  
          <h1 class="my-4">Post</h1>
          <hr>
        
          <!-- Blog Post -->
          <div class="card mb-4">
            {{-- @foreach ($articles as $article) --}}
              <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
              <div class="card-body">
                <h2 class="card-title">{{$article->title}}</h2>
                <p class="card-text">{{$article->content}}</p>
              </div>
              <div class="card-footer text-muted">
               Posted on {{$article->created_at->diffForHumans()}} by
                <a href="#">{{$article->user->name}}</a>
              </div>
          </div>

          <div class="card mb-4">
              <div class="card-body">
                <h4 class="card-title">Comment</h3>
                  <hr>
                @foreach ($comments as $comment)
                <div class="">
                    <ul style="font-size:14px">
                      <li>{{$comment->user->name}}</li>
                    <span><i>"{{$comment->message}}"</i></span>
                    <span style="color:gray">&nbsp;{{$comment->created_at->diffForHumans()}}</span><br>
                    @auth
                    <i class="far fa-edit" style="color:#007bff"></i><a href="#"> Edit &nbsp;</a>
                    <i class="fas fa-trash-alt" style="color:#007bff"></i><a href="#" > Delete</a>
                    @endauth
                      <hr>
                    </ul>
                  </div>
                @endforeach
                @auth
                  <form action="{{route('main.comment', $article)}}" class="" method="POST">
                    @csrf
                   <p><textarea name="message" class="form-control" placeholder="Tambahkan komentar..."></textarea></p>
                   <input class="btn btn-primary" type="submit" value="Add Comment">
                  </form> 
                @endauth
                @guest
                  <span><b><a href="{{route('login')}}">Login </b></a>dulu untuk komentar</span>
                @endguest
               
                
              </div>
          </div>

  
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



 

