<!doctype html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css')  }}">
    <title>ToDoApp</title>
</head>

<body>

<header class="header bg-primary mb-4">
    <h1 class="header__h1 display-4 text-white">To do app <span class="fab fa-the-red-yeti"></span></h1>
</header>
<div class="container">
    <main class="main row">
        <aside class="aside col-3">
            <ul class="aside__ul list-group text-center">
                <li class="aside__li"><a href="{{ route('index') }}"><h5>Strona główna</h5></a></li>
                <li class="aside__li"><a href="{{ route('create') }}"><h5>Nowa notatka</h5></a></li>
            </ul>
        </aside>
        <section class="section col-9">
            @yield('content')
        </section>
    </main>
</div>
<footer class="footer bg-primary mt-4">
    <h6 class="text-white footer__h6">Copyright &copy; Wszystkie prawa zastrzeżone.</h6>
</footer>
<script src="https://kit.fontawesome.com/9e7d514733.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
