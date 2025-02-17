<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Bootstrap demo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    </head>
    <body>
    
    <header>
    <div class="sidebar">
        <div class="title-sidebar">Laundry Bersih</div>
        <hr>
        <ul>
            @if(auth()->user()->role == 'admin')
            <li>
                <a href="{{ route('dashboard.admin') }}">
                    <span class="material-symbols-outlined me-2">
                        dashboard
                        </span>
                    Dashboard</a>
            </li>
            <li>
                <a href="{{ route('create') }}">
                    <span class="material-symbols-outlined me-2">
                        add_box
                        </span>
                    Input Data</a>
            </li>
            <li>
                <a href="#">
                    <span class="material-symbols-outlined me-2">
                        folder_open
                        </span>
                    Data Laundry</a>
            </li>
        
            @else
            <li>
                <a href="{{ route('dashboard.admin') }}">
                    <span class="material-symbols-outlined me-2">
                        dashboard
                        </span>
                    Dashboard</a>
            </li>
            @endif
            <li class="li-logout">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('post-form').submit();">
                    <span class="material-symbols-outlined me-2">
                        logout
                        </span>
                    Logout</a>
                    <form id="post-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            </li>
        </ul>
    </div>
    </header>
    
        <main>
        <div class="content">

    @yield('content')

            
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>