@extends('layout')

@section('content')
    <div class="container">
        <h1 class="md-5">Formulaire de contact</h1>
        <form method="post" action="{{route('send')}}">
            @csrf
            <div class="form-group">
                <input type="text" placeholder="Votre nom" required class="form-control" name="lastname">
                <input type="text" placeholder="Votre prénom" required class="form-control" name="firstname">
                <input type="text" placeholder="Votre email" required class="form-control" name="email">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Objet" required class="form-control" name="subject">
            </div>
            <div class="form-group">
                <label>Votre message</label>
                <textarea name="content" cols="173" rows="5" required></textarea>
            </div>
            <button type="submit" class="mt-3 btn btn-primary">Envoyer le message</button>
        </form>
    </div>

@endsection
