@extends('layouts.layout')
@section('titlePage')
    Ajouter une formation
@endsection
@section('content')
    <h1>Ajout d'une formation</h1>
    <div class="row">
        <form action="{{route('addTraining')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-12 form-group my-3">
                <label>Titre<span style="color: red">*</span></label>
                <input type="text" name="name" id="" class="form-control" required>
            </div>
            <div class="col-12 form-group my-3">
                <label>Description<span style="color: red">*</span></label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10" required></textarea>
            </div>
            <div class="col-12 form-group my-3">
                <label>Prix<span style="color: red">*</span></label>
                <input type="number" name="price" min="0" id="" class="form-control" required>
            </div>
            <div class="col-12 form-group my-3">
                <p class="mb-0">Catégorie(s) de la formation</p>
                <div class="btn-group">
                    @foreach ($category as $cat)
                        <input type="checkbox" name="category[{{$cat->id}}]" id="{{'cat'.$cat->id}}" class="btn-check" value="{{$cat->id}}">
                        <label for="{{'cat'.$cat->id}}" class="btn btn-outline-primary">{{$cat->name}}</label>
                    @endforeach
                </div>
            </div>
            <div class="col-12 form-group my-3">
                <p class="mb-0">Type de la formation<span style="color: red">*</span></p>
                <div class="btn-group">
                    @foreach ($type as $typ)
                        <input type="radio" name="typeId" id="{{'type'.$typ->id}}" class="btn-check" value="{{$typ->id}}">
                        <label for="{{'type'.$typ->id}}" class="btn btn-outline-info">{{$typ->name}}</label>
                    @endforeach
                </div>
            </div>
            <div class="col-12 form-group my-3">
                <label>Image<span style="color: red">*</span></label>
                <input type="file" name="image" id="" class="form-control" accept="image/*">
            </div>
            @for ($i = 1; $i < 4; $i++)
                <p class="mb-0">Chapitre {{$i}}</p>
                <div class="col-12 form-group my-3">
                    <label>Nom</span></label>
                    <input type="text" name="chapter[{{$i}}][name]" class="form-control">
                </div>
                <div class="col-12 form-group my-3">
                    <label>Contenu</span></label>
                    <textarea class="form-control" name="chapter[{{$i}}][content]" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="col-12 form-group my-3">
                    <label>Temps estimé (en heure)</span></label>
                    <input type="number" min="0" max="12" name="chapter[{{$i}}][time]" class="form-control">
                </div>
                <hr/>
            @endfor
            @if ($errors->any())
                <div class="col-12">
                    @foreach ($errors->all() as $er)
                        <p class="mb-0" style="color: red">{{$er}}</p>
                    @endforeach
                </div>
            @endif
            <div class="col-12 form-group my-3">
                <button class="btn btn-success" type="submit">Sauvegarder</button>
            </div>
        </form>
    </div>
@endsection