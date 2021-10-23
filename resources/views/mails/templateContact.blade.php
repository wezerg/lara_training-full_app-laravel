Hello <br/>
Vous avez reçu une nouvelle demande d'adhésion.
<br/>
Nom : {{$name}} <br/>
Prénom : {{$firstname}} <br/>
Email : {{$email}}
<form action="https://localhost:8000/valid/user/{{$name}}">
    @csrf
    <a href="localhost:8000/valid/user/nlop" class="btn btn-primary">Accepter</a>
</form>