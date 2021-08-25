@extends('posts.layout')

@section('content')

<div class="container  ">

    <P class=" fs-1 fw-bold mt-5">Create a new post</P>

    <form class="mt-5" action="{{ route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">

            <label for="title">Title</label>
            <input type="text" class="form-control @error("title") is-invalid @enderror" name="title" value="{{ old("title") }}">
            @error("title")
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">

            <label for="category">Category</label>
            <select class="form-control @error("category_id") is-invalid @enderror" name="category_id">
                <option value="0">-- Choix --</option>
                @foreach ( $categories as $category )

                <option value="{{$category->id }}">{{$category->nom }}</option>

                @endforeach

            </select>
            @error("category_id")
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

        </div>

        <div class="form-group">
            <label for="tags">Selectionner une ou plrs tags</label>
            <select class="form-control" name="tags[]" id="tags" multiple>
                <option>-- Choix --</option>
                @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="img">Choisir une image</label>
            <input type="file" class="form-control" name="img_path" id="img">
        </div>

        <div class="mb-3 input-group">

            <label for="content" class="form-label input-group-text">Content</label>
            <textarea class="form-control" aria-label="With textarea" name="content"></textarea>
        </div>

        <a class="btn btn-dark " href="{{ route('posts.index') }}"> Back</a>


        <button type="submit" class="btn btn-success">Envoyer</button>



    </form>

</div>





@endsection
