<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .nav-bar .nav-bar-ul li{
        list-style: none;
        padding:0.5em 0.5em;
    }
    .nav-bar .nav-bar-ul{
        display:flex;
        margin: 0px;
        background-color:#1B2631;
        color:#fff;
    }
    .nav-bar{
        border:1px solid #000;
    }
    .rigth{
        margin-left: 65%;
        border:none;
        font-size:20px; 
    }
    .rigth a{
        color:#fff
    }
    .nav-bar-s{
        background-color: deepskyblue;
        font-size: 20px;
        color:#fff;
    }
    .nav-bar-s ul{
        display:flex;
        margin-left: 35%;
        margin-top: 50px;
    }
    .nav-bar-s ul li{
        list-style: none;
        padding: 10px 20px 20px 20px;
        
    }
    .nav-bar-s .band{
        background-color: #1B2631;
        height: 50px;
    }
    .section-first{
        background-image:url('/images/pile-livres-design-plat-dessines-main_23-2149331952.avif');
        background-position:center;
    }
    .section-first .img-test{
        position : absolute;
        height: 300px;
        width:200px;
        bottom: 20%;
        left:65%;
    }
    #section-s{
        position: relative;
        background-color: #000;
        opacity:0.5;
        height:70vh;
    }
    .section-first h1{
        position : absolute;
        bottom: 35%;
        left:19%;
        color:deepskyblue;
        font-size: 100px;
    }
    .section-first h2{
        position : absolute;
        bottom: 25%;
        left:20%;
        font-size: 50px;
        color:#fff;
    }
    .nav-bar-s nav{
        display: flex;

    }
    .logo{
        height: 150px;
        width: 150px;
        margin-left:25px;
    }
    .book{
        background-color: #ccc;
    }
    .section-second{
        background-image:url('/images/liste-editeurs-nouvelles.jpg');
    }
    .section-second img{
        padding-top: 50px;
    }

    @keyframes custom-zoom {
    from {
        transform: scale(1);
    }
    to {
        transform: scale(1.2);
    }
    }

    /* Appliquer l'animation lorsqu'on survole l'élément */

    .custom-zoom-animation img:hover {
        transform: scale(1.1);
        transition: transform 0.3s ease-in-out;
    }
    .custom-zoom-animation img:active {
        transform: scale(0.9);
        transition: transform 0.3s ease-in-out;
    }
    .custom-show .img-book{
        width:350px;
        height: 500px;
    }
    .nav-bar-s .band:hover{
        transform: scale(0.9);
    }
    .nav-bar-s li a{
        color: #fff;
        text-decoration: none;
    }
    </style>
</head>
<body>
    <div class="header-div">
        <nav class="nav-bar">
            <ul class="nav-bar-ul">
                <li class="rigth"><a href="#">Français</a></li>
            </ul>
        </nav>
    </div>
    @php
        $route = request()->route()->getName();
    @endphp
    <div class="nav-bar-s custom-navbar">
        <nav>
            <img class="logo" src="/images/logo.png"/>
            <ul>
                <li @class(['band' => str_contains($route,'index')])><a href="{{route('home.index')}}">Accueil</a></li>
                <li @class(['band' => str_contains($route,'catalog')])><a href="{{route('home.catalog')}}">Catalogue</a></li>
                <li @class(['band' => str_contains($route,'apropos')])><a href="">A propos</a></li>
                <li @class(['band' => str_contains($route,'contact')])><a href="">Nous-contactez</a></li>
            </ul>
        </nav>
    </div>
    <div class="custom-show">
        @yield('showbook')
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>