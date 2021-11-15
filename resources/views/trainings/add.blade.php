@extends('layout')

@section('content')
    <div class="container">
        <h1>Ajouter une nouvelle formation</h1>

        @if($errors->any())
            <ul class="alert alert-danger" style="list-style-type: none;">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <form method="post" action="{{route('trainingStore')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Titre</label>
                <input type="text" class="form-control" name="title" required>
            </div>

            <div class="form-group">
                <label>Extrait</label>
                <input type="text" class="form-control" name="extract" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="5" name="description" required></textarea>
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="picture" required accept="image/png, image/jpeg, image/jpg">
            </div>

            <label>Catégorie(s) de la formation</label>
            <div>
                @foreach($categories as $category)
                    <div class="form-check form-check-inline">
                        <input type="checkbox"
                               class="form-check-input"
                               id="check-{{$category->id}}"
                               name="categories[]"
                               value="{{$category->id}}"
                        >
                        <label class="form-check-inline" for="check-{{$category->id}}">{{$category->label}}</label>
                    </div>
                @endforeach
            </div>

            <label>Type de la formation</label>
            <div>
                @foreach($types as $type)
                    <div class="form-check form-check-inline">
                        <input type="checkbox"
                               class="form-check-input"
                               id="check-{{$type->id}}"
                               name="categories[]"
                               value="{{$type->id}}"
                        >
                        <label class="form-check-inline" for="check-{{$type->id}}">{{$type->label}}</label>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection

