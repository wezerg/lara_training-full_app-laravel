@extends('layouts.layout')
@section('titlePage')
    Accueil
@endsection
@section('content')
    <h1>Bienvenue sur Lara Training</h1>
    @foreach ($training as $train)
    <div class="row bg-light my-2">
        <div class="col-6">
            <h3>{{$train->name}}</h3>
            <p>{{$train->description}}</p>
            <p>{{$train->price}}</p>
            <p>Image : {{$train->image}}</p>
            <form action="{{route('trainingDetailView', $train->id)}}">
                <a class="btn btn-primary" href="{{route('trainingDetailView', $train->id)}}">Détails</a>
            </form>
        </div>
        <div class="col-6">
            <p class="mb-5">{{$train->getOwner->firstname." - ".$train->getOwner->name}}</p>
            @foreach ($train->getChapter as $chap)
                <p class="mb-0">{{"Chapitre : ".$chap->name}}</p>
                <p>{{"Temps : ".$chap->time}}</p>
            @endforeach
        </div>
        <div class="col-12">
            @foreach ($train->getCategory as $cat)
                <p>{{"Catégorie : ".$cat->name}}</p>
            @endforeach
            <hr/>
            <p>Type : {{$train->getType->name}}</p>
        </div>
    </div>
    @endforeach
@endsection