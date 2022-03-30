<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{ asset('js/app.js') }}"></script>

    <title>Laravel</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light"><a class="navbar-brand" href="/">Online Blog</a>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a class="nav-link" href="{{ url('categories') }}">Categories</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('articles') }}">Articles</a></li>
    </ul>
    <span class="navbar-text">
        Last posted article: {{ $lastPostedArticle }}<br>
    </span>
</nav>
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-10 text-left">
            @yield('content')
        </div>
    </div>
</div>

<footer class="container-fluid text-center">
    @yield('footer')
</footer>
</body>

</html>
