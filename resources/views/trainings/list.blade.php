@extends('layout')

@section('content')

     @include('components.banner', ['title' => 'Bannière liste des formations'])

     @if(\Illuminate\Support\Facades\Auth::check())
        <a href="{{route('trainingAdd')}}" class="btn btn-primary">Ajouter une formation</a>
     @endif

     <h1>Nos formations</h1>
    <div class="row">
        @if(sizeof($trainings) > 0)
            @foreach($trainings as $training)
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="{{asset("storage/$training->picture")}}"
                             style="object-fit: cover" height="200">
                        <div class="card-body">
                            <div>
                                @foreach($training->categories as $category)
                                    <span>{{$category->label}}</span>
                                @endforeach
                            </div>
                            <h5>{{$training->title}}</h5>
                            <p>{{$training->extract}}</p>

                            @if($training->countComments() == 0)
                                <p>Pas de commmentiare</p>
                            @elseif($training->countComments() == 1)
                                <p>1 commentaire</p>
                            @else
                                <p>{{$training->countComments()}} commentaires</p>
                            @endif

                            @if(!empty($training->user->firstname))
                                <p>Ecrit par {{$training->user->firstname}} {{$training->user->lastname}}</p>
                            @endif

                            <div>
                                @foreach($training->types as $type)
                                    @if($type->label == 'Tout les niveaux')
                                        <span>{{$type->label}}</span>
                                    @else
                                        <span>Niveau {{$type->label}}</span>
                                    @endif
                                @endforeach
                            </div>



                            <div class="d-flex">
                                <a href="{{route('trainingDetails', $training->id)}}" class="btn btn-primary">Détails</a>
                                @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->id === $training->user)
                                    <form method="post" action="{{route('trainingDelete',$training->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Supprimer</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>Il n'y a aucun article.</p>
        @endif
    </div>

@endsection
