<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Основная страница</title>
</head>
<body>
<header>
    <nav class="navbar fixed-top navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
        <div class="container-fluid container">
            <a class="navbar-brand" href="{{route('index')}}">My market</a>
            <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                <ul class="navbar-nav flex-grow-1">
                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{route('sector.index')}}">Секторы</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{route('category.index')}}">Категории</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{route('product.index')}}">Продукты</a>
                            </li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="container" style="margin-top: 7em">
    <main role="main" class="pb-3 h-100">
        @yield('content')
    </main>
</div>
</body>
</html>
