@extends('posts.layout')

@section('content')

<div class="container  ">

    <P class=" fs-1 fw-bold mt-5">Create a new tag</P>

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

    <form class="mt-5" action="{{ route('tags.create')}}" method="POST">
        @csrf

        <div class="mb-3 input-group ml-auto">

            <label for="title" class="form-label input-group-text">Nom</label>
            <input type="text" class="form-control" name="nom" aria-describedby="Title">

        </div>



        <a class="btn btn-dark " href="{{ route('tags.index') }}"> Back</a>


        <button type="submit" class="btn btn-success">Créer</button>



    </form>

</div>





@endsection
