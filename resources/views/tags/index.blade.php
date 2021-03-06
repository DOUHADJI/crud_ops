@extends('posts.layout')


@section('content')

<div class="mt-3 p-3">

    <div class="container">

        @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

        @endif

        <a href="{{ route('tags.create') }}">
            <button class="btn btn-success  mb-3"> Add a new tag</button>
        </a>

        <a href="{{ route('posts.create') }}">
            <button class="btn btn-secondary  mb-3"> Create a new post</button>
        </a>

        <a href="{{ route('posts.index') }}">
            <button class="btn btn-success  mb-3"> See posts</button>
        </a>



    </div>


            <div class="container">
                <div class="row row-cols-3">
                    @foreach ( $tags as $tag )

                          <div class="col">
                            <div class="card mb-3">
                                <h5 class="card-header"> <em> <b>{{$tag-> nom}} </b> </em> </h5>
                                <div class="card-body">
                                  <h5 class="card-title">Tag uses for</h5>
                                  <p class="card-text">{{ $tag -> posts()->count()}} posts</p>
                                  <a href="#" class="btn btn-warning">Update</a>
                                  <a href="#" class="btn btn-danger">Delete</a>
                                </div>
                              </div>
                          </div>

                    @endforeach
                
                </div>
            </div>

        {!! $tags->links() !!}
    </div>



</div>

@endsection
