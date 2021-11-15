@extends('layout')

@section('content')

    <div class="form-group">
        <a href="{{route('trainingList')}}"
           class="btn btn-primary">
            << Retourner à la liste des formations
        </a>
    </div>

    <div class="container">
        <h1>Les catégories</h1>

        @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->user_type === 1 )
            <ul>
                @foreach($categories as $category)
                    <li>
                        <form method="post" action="{{route('categoryUpdate', $category->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input type="text" name="label" required class="form-control" value="{{$category->label}}">
                            </div>
                            <button class="btn btn-primary btn-sm" type="submit">Modifier</button>
                        </form>

                        <form method="post" action="{{route('categoryDelete', $category->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                        </form>
                    </li>
                @endforeach
            </ul>

            <a href="{{route('categoryAdd')}}" class="btn btn-primary">Ajouter une catégorie</a>

        @else
            <ul>
                @foreach($categories as $category)
                    <li>
                        <h3>{{$category->label}}</h3>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
