@extends('posts.layout')

@section('content')

<div class="container  ">

    <P class=" fs-1 fw-bold mt-5">Edit the post</P>

    @if ($errors->any())

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

    <form class="mt-5" action="{{ route('posts.update', $post ->id )}}" method="POST">
        @csrf
        @method('PUT')


        <div class="mb-3 input-group ml-auto">

          <label for="title" class="form-label input-group-text">Title</label>
          <input type="text" class="form-control" name="title" aria-describedby="Title" value="{{ $post->title}}">

        </div>

        <div class="mb-3 input-group">

            <label for="slug" class="form-label input-group-text">Slug</label>

            <input type="text" class="form-control" name="slug" aria-describedby="Slug" value="{{ $post->slug}}">
  
          </div>

          <div class="mb-3 input-group">

            <label for="category" class="form-label input-group-text">Category</label>
            <select class="form-select" name="category">
                <option selected value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
  
          </div>

          <div class="mb-3 input-group">

            <label for="content" class="form-label input-group-text">Content</label>
            <textarea class="form-control" aria-label="With textarea" name="content" value="{{ $post->content}}">{{ $post->content}}</textarea>

  
          </div>

        <a class="btn btn-dark " href="{{ route('posts.index') }}">Back</a>

       
        <button type="submit" class="btn btn-success">Modifier</button>



      </form>
    
</div>


  
@endsection