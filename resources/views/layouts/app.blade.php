<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <title>Expense Tracker</title>
    <meta name="robots" content="noindex">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Expense Tracker</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('expense.index')}}">Tracker</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('category.index')}}">Categories</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" aria-current="page" href="{{route('csv')}}">Import/Export csv</a>
                </li>
                @endauth
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                        </a>
                    </li> 
                    <li class="nav-item">
                        <form class="form-inline my-2 my-lg-0" action="{{route('auth.destroy',Auth::user()->id)}}" method="POST">
                            @csrf 
                            @method('delete')
                            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Logout</button>
                        </form>
                    </li>
                    @endauth        
                    @guest
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('auth.index')}}">
                            Login
                        </a>
                    </li>            
                    @endguest
            </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="/js/bootstrap.min.js"></script>
</body>
</html>