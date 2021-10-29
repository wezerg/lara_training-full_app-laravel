@extends('layouts.layout')
@section('titlePage')
    Accueil
@endsection
@section('content')
    <h1>Bienvenue sur le dashboard admin</h1>
    <div class="row justify-content-center">
        <div class="col-lg-6 col-12 px-4">
            <h2>Listes des utilisateurs</h2>
            @foreach ($usersActive as $user)
                <div class="row bg-light my-2 p-3 align-items-center">
                    <div class="col-3">
                        <p class="mb-0">{{$user->name}}</p>
                    </div>
                    <div class="col-3">
                        <p class="mb-0">{{$user->firstname}}</p>
                    </div>
                    <div class="col-3">
                        <p class="mb-0">{{$user->email}}</p>
                    </div>
                    <div class="col-3 text-end">
                        <form action="{{route('removeUser', $user->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-lg-6 col-12 px-4">
            <h2>Liste des demandes d'adhésion</h2>
            @foreach ($usersInactive as $user)
                <div class="row bg-light my-2 p-3 align-items-center">
                    <div class="col-2">
                        <p class="mb-0">{{$user->name}}</p>
                    </div>
                    <div class="col-2">
                        <p class="mb-0">{{$user->firstname}}</p>
                    </div>
                    <div class="col-2">
                        <p class="mb-0">{{$user->email}}</p>
                    </div>
                    <div class="col-3 text-end">
                        <form action="{{route('validUser', $user->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Accepter</button>
                        </form>
                    </div>
                    <div class="col-3">
                        <form action="{{route('removeUser', $user->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Refuser</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <hr/>
    <div class="row justify-content-center">
        <div class="col-lg-6 col-12 px-4">
            <h2>Listes des catégorie</h2>
            @foreach ($category as $cat)
                <div class="row bg-light my-2 p-3 align-items-center">
                    <div class="col-6">
                        <p class="mb-0">{{$cat->name}}</p>
                    </div>
                    <div class="col-6 text-end">
                        <form action="{{route('removeCat', $cat->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            @endforeach
            <div class="row bg-light my-2 p-3 align-items-center">
                <p style="font-size: 1.15em;">Ajouter une catégorie</p>
                <form action="{{route('addCat')}}" method="POST">
                    @csrf
                    <div class="from-group col-12">
                        <input type="text" name="name" id="" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success my-3">Ajouter</button>
                </form>
            </div>
        </div>
        <div class="col-lg-6 col-12 px-4">
            <h2>Liste des types</h2>
            @foreach ($type as $typ)
                <div class="row bg-light my-2 p-3 align-items-center">
                    <div class="col-6">
                        <p class="mb-0">{{$typ->name}}</p>
                    </div>
                    <div class="col-6 text-end">
                        <form action="{{route('removeType', $typ->id)}}" method="POST" required>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            @endforeach
            <div class="row bg-light my-2 p-3 align-items-center">
                <p style="font-size: 1.15em;">Ajouter un type</p>
                <form action="{{route('addType')}}" method="POST">
                    @csrf
                    <div class="from-group col-12">
                        <input type="text" name="name" id="" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success my-3">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
@endsection