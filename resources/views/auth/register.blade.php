@extends('layout')

@section('content')

    <div class="container">

        @if($errors->any())
            <ul class="alert alert-danger" style="list-style-type: none;">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <form method="post" action="{{route('registerStore')}}">
            @csrf
            <div class="form-group">
                <label>Prénom</label>
                <input type="text" class="form-control" required name="firstname">
            </div>

            <div class="form-group">
                <label>Nom</label>
                <input type="text" class="form-control" required name="lastname">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" required name="email">
            </div>

            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" class="form-control" required name="password">
            </div>

            <div class="form-group">
                <label>Confirmation du mot de passe</label>
                <input type="password" class="form-control" required name="password_confirmation">
            </div>

            <button type="submit" class="btn btn-primary">Inscription</button>
        </form>
    </div>
@endsection
