@extends('layout')

@section('content')
    <div class="container">

        <div class="form-group">
            <a href="{{route('trainingList')}}"
               class="btn btn-primary">
                << Retourner à la liste des formations
            </a>
        </div>

        @if(\Illuminate\Support\Facades\Auth::check() && (\Illuminate\Support\Facades\Auth::user()->id === $training->user  || \Illuminate\Support\Facades\Auth::user()->user_type === 1))
            <div class="col-md-6">
                <form method="post" action="{{route('trainingUpdate',$training->id)}}">
                    @csrf
                    <div class="form-group">
                        <label>Titre</label>
                        <input type="text" class="form-control" name="title" required value="{{$training->title}}">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="5" required>{{$training->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Extrait</label>
                        <input type="text" class="form-control" name="extract" required value="{{$training->extract}}">
                    </div>

                    <label>Catégorie de la formation</label>
                    <div>
                        @foreach($categories as $category)
                            <div class="form-check form-check-inline">
                                <input type="text" class="form-control" name={{$category->title}} required>
                                <input type="text" class="form-control" name={{$category->description}} required>
                                <label class="form-check-inline" for="check-{{$category->id}}">{{$category->label}}</label>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>

                <p>Créer le {{$training->created_at->format('d/m/Y')}}</p>
            </div>
            <div class="col-md-6">
                <form method="post" action="{{route('trainingUpdatePicture', $training->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Modifier l'image de l'article</label>
                        <input type="file" name="picture" required class="form-control">
                    </div>
                    <button class="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>

            <form method="post" action="{{route('trainingDelete',$training->id)}}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Supprimer cette formation</button>
            </form>

        @else
            <h1>{{$training->title}}</h1>
            <p>{{$training->description}}</p>

            <div>
                <h2>Catégorie(s)</h2>
                @foreach($training->categories as $category)
                    <p>{{$category->label}}</p>
                @endforeach
            </div>

            <div>
                <h2>Type(s)</h2>
                @foreach($training->types as $type)
                    <p>{{$type->label}}</p>
                @endforeach
            </div>

            <h2>Chapitres</h2>
            <div>
                @foreach($training->chapters as $chapter)
                    <h3>{{$chapter->number_of_chapter}}. {{$chapter->title}}</h3>
                    <p>{{$chapter->description}}</p>
                @endforeach
            </div>

        @endif

        <div class="row">

            <div class="form-group">
                <h2>Commentaire</h2>
                @if($training->countComments() > 0)
                    <ul>
                        @foreach($training->comments as $comment)
                            <li>
                                <strong>{{$comment->title}}</strong>
                                <p>{{$comment->content}}</p>
                                @if(\Illuminate\Support\Facades\Auth::user()->user_type === 1)
                                    <form method="post" action="{{route('commentDelete', $comment->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>Il n'y a aucun commentaire</p>
                @endif

                <form method="post" action="{{route('commentStore', $training->id)}}">
                    @csrf
                    <label>Votre commentaire</label>
                    <div class="form-group">
                        <label>Titre:</label>
                        <input type="text" class="control-form" name="title" required>
                        <label>Description:</label>
                        <input type="text" class="control-form" name="content" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter ce commentaire</button>
                </form>

            </div>

    </div>

@endsection

