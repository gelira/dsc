@include('recursos')

<html>
    <head>
        <title>Lista de Compras - @yield('titulo')</title>
        @stack('css')
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="{{ route('home') }}" class="navbar-brand">Lista de Compras</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre</a>
                    </li>
                    @if (session()->has('usuario'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sair') }}">Sair</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>

        <div class="container" style="margin-top: 20px">
            @if( $errors->any() )
            <div class="alert alert-danger" role="alert">
                <ul>
                @foreach( $errors->all() as $error )
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif
            @if( session()->has('message') )
            <div class="alert {{ session('message-type') }}" role="alert">
                {{ session('message') }}
            </div>
            @endif
            @yield('conteudo')
        </div>

        @stack('js')
    </body>
</html>