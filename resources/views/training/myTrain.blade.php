@extends('layouts.layout')
@section('titlePage')
    Mes formations
@endsection
@section('content')
    <h1>Catalogues de vos formations</h1>
    @foreach ($training as $train)
    <div class="row bg-light my-2">
        <div class="col-3">
            <h3>{{$train->name}}</h3>
            <p>{{$train->description}}</p>
            <p>{{$train->price}}</p>
            <p>Image : {{$train->image}}</p>
        </div>
        <div class="col-3">
            @foreach ($train->getCategory as $cat)
                <p>{{"Catégorie : ".$cat->name}}</p>
            @endforeach
            <p>Type : {{$train->getType->name}}</p>
        </div>
        <div class="col-3">
            <a class="btn btn-primary" href="{{route('editTrainingView', $train->id)}}">Modifier</a>
        </div>
        <div class="col-3">
            <form action="{{route('removeTraining', $train->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Supprimer</button>
            </form>
        </div>
    </div>
    @endforeach
@endsection