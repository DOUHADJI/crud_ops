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



    </div>


        <table class=" table ">

            <tr>

                <th>Nom</th>

                <th>Action</th>

            </tr>

            @foreach ($tags as $tag)

            <tr>

              


                <td> <span class="badge bg-info"> {{$tag -> nom}} </span></td>


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
