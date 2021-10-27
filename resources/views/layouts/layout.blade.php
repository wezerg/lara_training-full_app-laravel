<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>@yield('titlePage', 'Titre')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('trainingListView')}}">Lara training</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{route('trainingListView')}}">Accueil</a>
              </li>
              @if (Auth::user())
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('myTrainView')}}">Mes formations</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="{{route('profileView')}}">Mon profil</a>
                </li>
              @endif
              {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
              </li> --}}
            </ul>
            {{-- <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form> --}}
            @if (Auth::user())
                @if (Auth::user()->role === 'Admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboardView')}}">Dashboard</a>
                </li>
                @endif
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <li class="nav-item">
                        <button class="btn btn-danger btn-sm" href="{{route('trainingListView')}}">Déconnexion</button>
                    </li>
                </form>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contactView')}}">Contact</a>
                </li>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <li class="nav-item">
                        <button class="btn btn-success btn-sm" href="{{route('login')}}">Login</button>
                    </li>
                </form>
            @endif
          </div>
        </div>
      </nav>
    <div class="container-fluid">
        @yield('content')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>