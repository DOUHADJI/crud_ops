@extends('posts.layout')

@section('content')

<div class="container pt-5">

    <span class="border border-dark  fs-3 fw-bold mt-3 "><span class="m-1 p-2  bg-primary text-white">Edit the post</span></span>

    

    <form class="mt-5 p-3 bg-light rounded" action="{{ route('posts.update', $post )}}"  method="POST" enctype="multipart/form-data">
        @csrf
        

        <div class="form-group">

            <div class="row">

                <div class="col">

                    <label for="img" class="fs-4 fst-italic text-primary">Choisir une image</label>
                    <input type="file" class="form-control @error("img_path") is-invalid @enderror" name="img_path" id="img" value="" >

                    @error("img_path")
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror

                </div>

                <div class="col">
                  
                    <label for="title" class="fs-4 fst-italic text-primary">Title</label>
                    <input type="text" class="form-control @error("title") is-invalid @enderror" name="title" value="{{ $post->title }}">
                    
                    @error("title")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="col">
                  
                        <label for="category" class="fs-4 fst-italic text-primary ">Category</label>
                        <select class="form-control @error("category_id") is-invalid @enderror" name="category_id">
                            <option value="0">-- Choix --</option>
                            @foreach ( $categories as $category )

                            <option 
                            
                            @if($post->category_id == $category->id)
                              selected
                            @endif
                            
                            value="{{$category->id }}">{{$category->nom }}</option>

                            @endforeach

                        </select>
                        @error("category_id")
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                </div>

              

              </div>

          



        </div>


        <div class="form-group">


            <div class="row mt-5">

                <div class="col-4">

                    <label for="tags" class="fs-4 fst-italic text-primary input-group-text form-label">Selectionner une ou plrs tags</label>
                    <select class="form-control @error("tags[]") is-invalid @enderror" name="tags[]" id="tags" multiple >
                        <option>-- Choix --</option> 

                        @foreach ($tags as $tag )
                        <option 
                        
                        @foreach ($post->tags as $t )
                          @if($t->id == $tag->id)
                            selected
                          @endif
                        @endforeach
                        value="{{ $tag->id }}">{{ $tag->nom }}</option>
                        @endforeach

                       
                    </select>

                    @error("tags[]")
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror


                </div>

                <div class="col-8">
                  
                    <label for="content" class="form-label input-group-text fs-4 fst-italic text-primary">Content</label>
                    <textarea class="form-control @error("content") is-invalid @enderror" aria-label="With textarea" name="content">{{$post->content}}</textarea>

                    @error("content")
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror

                </div>

              

              </div>

          



        </div>

          
          
        </div>

        <div class="container mt-5">

                
            <a class="btn btn-dark  m-2" href="{{ route('posts.index') }}"> Back</a>

        <button type="submit" class="btn btn-success">Edit the post</button>




        </div>




    </form>

</div>





@endsection
