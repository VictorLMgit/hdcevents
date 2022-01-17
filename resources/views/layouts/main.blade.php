<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fontes da aplicação -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <!-- CSS da Aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
        <!-- Bootstrap da aplicação -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <script src = "/JS/scripts.js"></script>
    </head>
    
    <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id = 'navbar' >
                <a href="/" class="navbar-brand"> <img src="/img/hdcevents_logo.svg" alt="HDC Events"></a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Events</a>
                    </li>
                    <li class="nav-item">
                        <a href="/events/create" class="nav-link">Create Event</a>
                    </li>
                    <li class="nav-item">
                        <a href="/events/login" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="/events/register" class="nav-link">Register</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row">
                @if(session('msg'))
                    <p class="msg">{{session('msg')}}</p>
                @endif
                @yield('content')
            </div>
        </div>
    </main>
       
    <footer>
        <p>
            HDC events &copy; <?= date('Y') ?>
        </p>
    </footer>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>

    
</html>
