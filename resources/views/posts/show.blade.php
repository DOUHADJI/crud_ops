@extends('posts.layout')

@section('content')

<p class="fs-1 fw-1">Post details</p>

<div class="card m-3 p-5" >
    <div class="row g-0">

      <div class="col-4">
        
        <div class="card border-success mb-3" style="max-width: 18rem;">
            <div class="card-header">Title</div>
            <div class="card-body text-success">
              <h5 class="card-title">{{$post->title}}</h5>
            </div>
          </div>

         

      </div>

      <div class="col-4">
        <div class="card border-primary mb-3" style="max-width: 18rem;">
            <div class="card-header">Slug</div>
            <div class="card-body text-success">
              <h5 class="card-title">{{$post->slug}}</h5>
              <p class="card-text"></p>
            </div>
          </div>


</div>

      <div class="col-4">
        <div class="card border-danger mb-3" style="max-width: 18rem;">
            <div class="card-header">Category</div>
            <div class="card-body text-success">
              <h5 class="card-title">not defined</h5>
              <p class="card-text"></p>
            </div>
          </div>
        
      </div>


    </div>
  </div>

  <div class="card border-warning m-3 p-5">
    <h5 class="card-header">Content</h5>
    <p class="card-text">{{$post->content}}</p>
    <p class="card-text"><small class="text-muted">{{$post->view_count}} views</small></p>
  </div>

  <div class="container">

    
    <form action="{{ route('posts.destroy',$post->id) }}" method="POST">

        <a class="btn btn-dark " href="{{ route('posts.index') }}">Back</a>
        <a class="btn btn-primary m-3" href="{{ route('posts.edit',$post->id) }}">Edit</a>

        @csrf

        @method('DELETE')

       <button type="submit" class="btn btn-danger m-3">Delete</button>

    </form>

      
</div>

@endsection