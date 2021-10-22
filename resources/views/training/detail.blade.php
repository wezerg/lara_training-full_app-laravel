@extends('layouts.layout')
@section('titlePage')
    {{$training->name}}
@endsection
@section('content')
    <h1>Bienvenue sur Lara Training</h1>
    <div class="row bg-light my-2">
        <div class="col-6">
            @foreach ($training->getCategory as $cat)
                <p>{{"Catégorie : ".$cat->name}}</p>
            @endforeach
            <p>Type : {{$training->getType->name}}</p>
            <p class="mb-5">{{$training->getOwner->firstname." - ".$training->getOwner->name}}</p>
        </div>
        <div class="col-6">
            <p>Image : {{$training->image}}</p>
            <h3>{{$training->name}}</h3>
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