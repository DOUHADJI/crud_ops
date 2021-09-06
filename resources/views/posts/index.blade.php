@extends('posts.layout')


@section('content')

<div class="mt-3 p-3">

    <div class="container">

        @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

        @endif

        <a href="{{ route('categories.index') }}">
            <button class="btn btn-secondary  mb-3"> See the categories</button>
        </a>

        <a href="{{ route('posts.create') }}">
            <button class="btn btn-success  mb-3"> Create a new post</button>
        </a>

        <a href="{{ route('tags.index') }}">
            <button class="btn btn-secondary  mb-3"> See the tags</button>
        </a>



    </div>


    <div class="container">
      <div class="row row-cols-4">

       <div class="col-md-12">
           <form action="">
               <div class="form-group">
                   <label for="category_name">Categorie</label>
                   <select class="form-control" name="category_id" id="category_id">
                       @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nom }}</option>
                       @endforeach

                   </select>
               </div>
               <div class="form-group">
                   <select class="form-control @error(" tags[]") is-invalid @enderror" name="tags[]" id="tags" multiple>
                    <option>-- Choix --</option>
                    @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->nom }}</option>
                    @endforeach
                </select>
               </div>
               <button class="btn btn-primary">Filter</button>
           </form>
           <table class="table">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Catégorie</th>
                        <th>Tags</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $posts as $post )
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>{{$post->category->nom}}</td>
                        <td>@foreach ($post->tags as $tag)
                            <span class="badge bg-primary">{{ $tag->nom }}</span>
                            @endforeach</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
       </div>



        {{-- <div class="col">
          <div class="card h-100 ">
            <img class="card-img-top  img-fluid" style="height: 14rem; " src="{{$post->full_img_path}}" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title"> <em>Title : </em>{{$post->title}}</h4>
              <hr>
              <h5 class="card-subtitle"> <em>Category : </em>{{$post->category->nom}}</h5>
              <hr>
              <p class="card-text">{{$post->content}}</p>
            </div>
            <div class="card-footer">

              <small class="text-muted">
                @foreach ($post->tags as $tag)
                  <span class="badge bg-primary">{{ $tag->nom }}</span>
                  @endforeach
              </small>
               <hr>

              <small class="container-fluid">
                <div class="row">
                  <div class="col">

                  <a class="btn btn-secondary" href="{{route("posts.edit", $post )}}">Edit</a>

                  </div>


                  <div class="col">
                     <form action="{{ route("posts.destroy", $post) }}" method="post">
                      @csrf
                      @method("DELETE")
                      <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                  </div>
                </div>

              </small>

            </div>
          </div>
        </div> --}}



      </div>
    </div>



        {!! $posts->links() !!}
    </div>





</div>

@endsection
