
@extends('posts.layout')


@section('content')

 <div  class="mt-3 p-3">

    <div class="container">

        @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

       <a href="{{ route('posts.create') }}"> 
            <button class="btn btn-success  mb-3"  > Create a new post</button>
        </a>

       

    </div>

    <div class="table">
            
    <table class=" table table-dark table-striped table-bordered ">

        <tr>

            <th>No</th>

            <th>title</th>

            <th>slug</th>

            <th>tags</th>

            <th>category</th>

            <th>View count</th>

            <th>Action</th>

        </tr>

        @foreach ($posts as $post)

        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $post->title }}</td>

            <td>{{ $post->slug }}</td>

            <td>{{$posts -> tags -> $tag ->nom}}</td>

            <td>{{ $post->categories ->nom }} not defined</td>
            
            <td>{{ $post->view_count }}</td>


            <td>

                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">

   

                    <a class="btn btn-info m-3 " href="{{ route('posts.show',$post->id) }}">Show</a>

    

                    <a class="btn btn-primary m-3" href="{{ route('posts.edit',$post->id) }}">Edit</a>

   

                    @csrf

                    @method('DELETE')

      

                    <button type="submit" class="btn btn-danger m-3">Delete</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>
  

  

    {!! $posts->links() !!}
    </div>

    

</div>

@endsection