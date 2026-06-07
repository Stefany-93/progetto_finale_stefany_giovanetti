<nav class="navbar navbar-expand-lg bg-turchese shadow">

    <div class="container-fluid">

        <a class="navbar-brand" href="#"><img id="logoNavbar" src="/media/logo.png" alt="Logo del sito" class="logo" width="150" height="100"></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav">

                <li class="nav-item nav-custom">
                    <a class="nav-link active" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item nav-custom">
                    <a class="nav-link" aria-current="page" href="{{ route('article.index') }}">Tutti gli articoli</a>
                </li>

                @auth

                <li class="nav-item dropdown nav-custom">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorie
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item" href="{{ route('byCategory', ['category' => $category]) }}">{{ $category->name }}</a>
                            </li>
                            @if (!$loop->last)
                                <hr class="dropdown-divider">
                            @endif
                        @endforeach
                    </ul>
                </li>

                @if (Auth::user()->is_revisor)
                    <li class="nav-item nav-custom">
                        <a class="nav-link btn btn-light btn-sm position-relative w-sm-25" href="{{ route('revisor.index') }}">
                            Zona Revisore
                        </a>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ \App\Models\Article::toBeRevisedCount() }}
                        </span>
                    </li>
                @endif

                <li class="nav-item dropdown">

                    <a href="#" class="nav-link dropdown-toggle nav-custom" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ciao {{Auth:: user()->name}}
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('create.article')}}" class="dropdown-item nav-custom">Crea</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
                        </li>
                        <form id="form-logout" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>

                </li>                

                @else

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle nav-custom" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Ciao Utente
                    </a>

                    <ul class="dropdown-menu ">

                        <li><a class="dropdown-item nav-custom" href="{{ route('login')}}">Accedi</a></li>
                        <li><a class="dropdown-item nav-custom" href="{{ route('register')}}">Registrati</a></li>

                    </ul>

                </li>

                @endauth

            </ul>

            <div class="d-flex align-items-center ms-3">
                <x-_locale lang="it" />
                <x-_locale lang="uk" />
                <x-_locale lang="fr" />
            </div>

            <form class="d-flex ms-auto" role="search" action="{{ route('article.search') }}" method="GET">
                <div class="input-group">
                    <input type="search" name="query" class="form-control" placeholder="Search" aria-label="search">
                    <button type="submit" class="input-group-text btn btn-outline-success" id="basic-addon2">
                        Search
                    </button>
                </div>
            </form>

        </div>

    </div>
    
</nav>