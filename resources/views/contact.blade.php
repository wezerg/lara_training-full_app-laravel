@extends('layouts.layout')
@section('titlePage')
    Candidature
@endsection
{{-- A FINIR !!!! --}}
@section('content')
    <div class="row">
        <h2>Contact</h2>
    </div>
    <div class="row bg-light my-2">
        <form action="{{route('sendContact')}}" method="POST">
            @csrf
            <div class="col-12 form-group">
                <label for="">Prénom<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="firstname" placeholder="Camille" id="" required>
            </div>
            <div class="col-12 form-group">
                <label for="">Nom<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="name" placeholder="Onette" id="" required>
            </div>
            <div class="col-12 form-group">
                <label for="">Email<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="email" placeholder="exemple@exemple.com" id="" required>
            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <p>{{$err}}</p>
                @endforeach
            @endif
            <button class="btn btn-success">Soumettre</button>
        </form>
    </div>
@endsection
