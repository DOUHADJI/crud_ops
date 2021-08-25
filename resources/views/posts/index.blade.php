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


        <table class=" table ">

            <tr>
                <th>Image</th>
                <th>title</th>
                <th>Categorie</th>
                <th>Tags</th>

                <th>View count</th>

                <th>Actions</th>

            </tr>

            @foreach ($posts as $post)

            <tr>
                <td><img src="{{ $post->fullImgPath }}" height="40" alt="" srcset=""></td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->category->nom }}</td>

                <td>
                    @foreach ($post->tags as $tag)
                    <span class="badge bg-primary">{{ $tag->nom }}</span>
                    @endforeach
                </td>


                <td>{{ $post->view_count }}</td>


                <td>
                    <form action="{{ route("posts.destroy", $post) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                    <a class="btn btn-primary" href="">Editer</a>
                </td>

            </tr>

            @endforeach

        </table>




        {!! $posts->links() !!}
    </div>



</div>

@endsection
