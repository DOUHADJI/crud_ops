@extends('posts.layout')

@section('content')

<div class="container  ">

    <P class=" fs-1 fw-bold mt-5">Create a new post</P>

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

    <form class="mt-5" action="{{ route('posts.store')}}" method="POST">
        @csrf

        <div class="mb-3 input-group ml-auto">

          <label for="title" class="form-label input-group-text">Title</label>
          <input type="text" class="form-control" name="title" aria-describedby="Title">

        </div>

        <div class="mb-3 input-group">

            <label for="slug" class="form-label input-group-text">Slug</label>

            <input type="text" class="form-control" name="slug" aria-describedby="Slug">
  
        </div>

          <div class="mb-3 input-group">

            <label for="category" class="form-label input-group-text">Category</label>
            <select class="form-select" name="category">

              @foreach ( $categories as $category )

              <option selected value="1">{{$category -> nom }}</option>

              @endforeach
               
              </select>
  
          </div>

          <div class="mb-3 input-group">

            <label for="slug" class="form-label input-group-text">Tags</label>

           

              

                  @foreach ($tags as $tag )

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                    <label class="form-check-label" for="inlineCheckbox2">{{$tag -> nom}}</label>
                  </div>

                  @endforeach
           
              
        </div>

          <div class="mb-3 input-group">

            <label for="content" class="form-label input-group-text">Content</label>
            <textarea class="form-control" aria-label="With textarea" name="content"></textarea>

            <input  name="view_count" type="hidden" value="{{0}}">
  
          </div>

        <a class="btn btn-dark " href="{{ route('posts.index') }}"> Back</a>

       
        <button type="submit" class="btn btn-success">Envoyer</button>



      </form>
    
</div>




  
@endsection