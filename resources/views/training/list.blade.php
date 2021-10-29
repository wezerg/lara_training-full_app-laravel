@extends('layouts.layout')
@section('titlePage')
    Accueil
@endsection
@section('content')
    <h1>Bienvenue sur Lara Training</h1>
    @foreach ($training as $train)
    <div class="row bg-light m-3 py-3">
        <div class="col-1">
            @if ($train->image)
                <img class="my-2" src="{{asset("storage/$train->image")}}" alt="imgTraining" style="width: 100px"/>
            @endif
        </div>
        <div class="col-6">
            <h3>{{$train->name}}</h3>
            <p class="mb-0">{{$train->description}}</p>
            <p class="mb-0">Prix : {{$train->price}} €</p>
        </div>
        <div class="col-4">
            <p class="mb-5">Auteur : {{$train->getOwner->firstname." - ".$train->getOwner->name}}</p>
            @foreach ($train->getChapter as $chap)
                <p class="mb-0">{{"Chapitre : ".$chap->name}}</p>
                <p class="mb-0">{{"Temps : ".$chap->time}}h</p>
            @endforeach
        </div>
        <div class="col-1 d-flex align-items-center">
            <form action="{{route('trainingDetailView', $train->id)}}">
                <a class="btn btn-primary" href="{{route('trainingDetailView', $train->id)}}">Détails</a>
            </form>
        </div>
        <div class="col-12 d-flex align-items-center my-2">
            <p class="mb-0">Catégorie : </p>
            @foreach ($train->getCategory as $cat)
                <p class="mb-0 mx-2 p-2" style="border: 1px solid red; border-radius: 5px">{{$cat->name}}</p>
            @endforeach
        </div>
        <div class="col-12 d-flex align-items-center">
            <p class="mb-0">Type : </p>
            <p class="mb-0 mx-2 p-2" style="border: 1px solid blue; border-radius: 5px">{{$train->getType->name}}</p>
        </div>
    </div>
    @endforeach
@endsection