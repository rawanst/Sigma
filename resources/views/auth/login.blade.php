@extends('layout')

@section('content')

    <div class="container">
        <h1>Formulaire de connexion</h1>

        <form method="post" action="{{route('login')}}">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" required class="form-control" name="email">
            </div>
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" required class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Connexion</button>
        </form>
        <br/>
        <a href="{{route('register')}}" class="btn btn-primary">S'inscrire</a>
    </div>
@endsection
