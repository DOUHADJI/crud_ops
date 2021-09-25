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
                        <form action="{{ route("auth.signin") }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nom complet</label>
                                <input class="form-control" type="text" name="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Votre email</label>
                                <input class="form-control" type="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Votre mot de passe</label>
                                <input class="form-control" type="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirmer le mot de passe</label>
                                <input class="form-control" type="password" name="password_confirmation">
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
