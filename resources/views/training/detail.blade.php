@extends('layouts.layout')
@section('titlePage')
    {{$training->name}}
@endsection
@section('content')
    <h1>Bienvenue sur Lara Training</h1>
    <div class="row bg-light m-3 p-3">
        <div class="col-1">
            @if ($training->image)
                <img class="my-2" src="{{asset("storage/$training->image")}}" alt="imgTraining" style="width: 100px"/>
            @endif
        </div>
        <div class="col-5">
            <h3>{{$training->name}}</h3>
        </div>
        <div class="col-6">
            <p class="mb-5">Auteur : {{$training->getOwner->firstname." - ".$training->getOwner->name}}</p>
        </div>
        <div class="col-6 d-flex align-items-center my-2">
            <p class="mb-0">Catégorie : </p>
            @foreach ($training->getCategory as $cat)
                <p class="mb-0 mx-2 p-2" style="border: 1px solid red; border-radius: 5px">{{$cat->name}}</p>
            @endforeach
        </div>
        <div class="col-6 d-flex align-items-center">
            <p class="mb-0">Type : </p>
            <p class="mb-0 mx-2 p-2" style="border: 1px solid blue; border-radius: 5px">{{$training->getType->name}}</p>
        </div>
        <hr/>
        @foreach ($training->getChapter as $chap)
        <div class="col-12 my-2">
            <h3 class="mb-0">{{"Chapitre : ".$chap->name}}</h3>
            <p>{{"Temps : ".$chap->time}}h</p>
            <p>{{"Contenu : ".$chap->content}}</p>
        </div>
        @endforeach
    </div>
@endsection