@extends('layouts.layout')
@section('titlePage')
    Edition d'une formation
@endsection
@section('content')
    <h1>Edition de {{$train->name}}</h1>
    <div class="row">
        <form action="{{route('editTraining', $train->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-12 form-group my-3">
                <label>Titre<span style="color: red">*</span></label>
                <input type="text" name="name" id="" class="form-control" required value="{{$train->name}}">
            </div>
            <div class="col-12 form-group my-3">
                <label>Description<span style="color: red">*</span></label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10" required>{{$train->description}}</textarea>
            </div>
            <div class="col-12 form-group my-3">
                <label>Prix<span style="color: red">*</span></label>
                <input type="number" name="price" min="0" id="" class="form-control" required value="{{$train->price}}">
            </div>
            <div class="col-12 form-group my-3">
                <p class="mb-0">Catégorie(s) de la formation</p>
                <div class="btn-group">
                    @foreach ($category as $cat)
                        <input type="checkbox" name="category[{{$cat->id}}]" id="{{'cat'.$cat->id}}" class="btn-check" value="{{$cat->id}}"
                        @if ($train->getCategory->contains('id', $cat->id))
                            checked
                        @endif>
                        <label for="{{'cat'.$cat->id}}" class="btn btn-outline-primary">{{$cat->name}}</label>
                    @endforeach
                </div>
            </div>
            <div class="col-12 form-group my-3">
                <p class="mb-0">Type de la formation<span style="color: red">*</span></p>
                <div class="btn-group">
                    @foreach ($type as $typ)
                        <input type="radio" name="typeId" id="{{'type'.$typ->id}}" class="btn-check" value="{{$typ->id}}"
                        @if ($train->getType->id === $typ->id)
                            checked
                        @endif>
                        <label for="{{'type'.$typ->id}}" class="btn btn-outline-info">{{$typ->name}}</label>
                    @endforeach
                </div>
            </div>
            <div class="col-12 form-group my-3">
                @if ($train->image)
                    <img src="{{asset("storage/$train->image")}}" alt="imgTraining" style="width: 100px">
                @endif
                <label>Image</label>
                <input type="file" name="image" id="" class="form-control" accept="image/*">
            </div>
            @foreach ($train->getChapter as $chap)
                <p class="mb-0">Chapitre</p>
                <div class="col-12 form-group my-3">
                    <label>Nom</span></label>
                    <input type="text" name="chapter[{{$chap->id}}][name]" class="form-control" value="{{$chap->name}}">
                </div>
                <div class="col-12 form-group my-3">
                    <label>Contenu</span></label>
                    <textarea class="form-control" name="chapter[{{$chap->id}}][content]" id="" cols="30" rows="10">{{$chap->content}}</textarea>
                </div>
                <div class="col-12 form-group my-3">
                    <label>Temps estimé (en heure)</span></label>
                    <input type="number" min="0" max="12" name="chapter[{{$chap->id}}][time]" class="form-control" value="{{$chap->time}}">
                </div>
                <hr/>
            @endforeach
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