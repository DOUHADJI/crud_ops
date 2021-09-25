@extends('posts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Créer votre compte
                </div>
                <div class="card-body">
                    <form action="{{ route("auth.login") }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Votre email</label>
                            <input class="form-control" type="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Votre mot de passe</label>
                            <input class="form-control" type="password" name="password">
                        </div>
                        <button class="btn btn-primary mt-5">Créer mon compte</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@endsection
