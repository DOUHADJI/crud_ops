@extends('posts.layout')


@section('content')

<div class="mt-3 p-3">

    <div class="container">

        @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

        @endif

        <a href="{{ route('posts.create') }}">
            <button class="btn btn-success  mb-3"> Create a new post</button>
        </a>



    </div>


        <table class=" table ">

            <tr>

                <th>title</th>
                <th>Categorie</th>
                <th>Tags</th>

                <th>View count</th>

                <th>Action</th>

            </tr>

            @foreach ($posts as $post)

            <tr>

                <td>{{ $post->title }}</td>
                <td>{{ $post->category->nom }}</td>

                <td>
                    @foreach ($post->tags as $tag)
                    <span class="badge bg-primary">{{ $tag->nom }}</span>
                    @endforeach
                </td>


                <td>{{ $post->view_count }}</td>


                <td>

                    {{-- <form action="{{ route('posts.destroy',$post->id) }}" method="POST">



                    <a class="btn btn-info m-3 " href="{{ route('posts.show',$post->id) }}">Show</a>



                    <a class="btn btn-primary m-3" href="{{ route('posts.edit',$post->id) }}">Edit</a>



                    @csrf

                    @method('DELETE')



                    <button type="submit" class="btn btn-danger m-3">Delete</button>

                    </form> --}}

                </td>

            </tr>

            @endforeach

        </table>




        {!! $posts->links() !!}
    </div>



</div>

@endsection
