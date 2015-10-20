<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('page-title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/arenastats.css">
</head>
<body>
@include('partials.header')
<div class="container">
    @yield('content')
</div>
<footer class="footer">
    <div class="callout-dark text-center fade-in-b">
        <h1>Powered by <a href="http://www.guru-gaming.com"><b>Guru-Gaming.com</b></h1></a>
        <p>Where community comes first</p>
    </div>
</footer>
<script src="/js/jquery.min.js"></script>
<script src="/js/boostrap.min.js"></script>
@yield('footer-scripts')
</body>
</html>