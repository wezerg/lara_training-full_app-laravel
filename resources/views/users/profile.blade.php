@extends('layouts.layout')
@section('titlePage')
    Accueil
@endsection
@section('content')
    <h1>Profil</h1>
    <form class="row" action="{{route('editUser', $user->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-lg-6 col-12 my-2">
            <div class="form-group">
                <label for="">Nom</label>
                <input type="text" class="form-control" name="name" id="" value={{$user->name}} required>
            </div>
            <div class="form-group">
                <label for="">Prénom</label>
                <input type="text" class="form-control" name="firstname" id="" value={{$user->firstname}} required>
            </div>
        </div>
        <div class="col-lg-6 col-12 my-2">
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" id="" value={{$user->email}} required>
            </div>
            <div class="form-group">
                <label for="">Mot de passe</label>
                <input type="password" class="form-control" name="password" id="" placeholder="●●●●●●●●●●●●">
            </div>
        </div>
        @if ($errors->any())
            <div class="col-12">
                @foreach ($errors->all() as $error)
                    <p class="mb-0" style="color: red">{{$error}}</p>
                @endforeach
            </div>
        @endif
        <div class="col-12 my-2">
            <button class="btn btn-success">Sauvegarder les modifications</button>
        </div>
    </form>
@endsection