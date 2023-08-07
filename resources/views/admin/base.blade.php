
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">SMART EDITION</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          @php
              $route = request()->route()->getName();
          @endphp
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a href="{{route('admin.book.index')}}" @class(['nav-link', 'active' => str_contains($route,'book.')]) aria-current="page" href="#">Gestion des livres</a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.author.index')}}" @class(['nav-link', 'active' => str_contains($route,'author.')]) href="#">Gestion des auteurs</a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.category.index')}}" @class(['nav-link', 'active' => str_contains($route,'category.')]) href="#">Gestion des categories</a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.genre.index')}}" @class(['nav-link', 'active' => str_contains($route,'genre.')]) href="#">Gestion des genres</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <div class="container mt-5">
        @if (session('success'))
            <div class='alert alert-success'>
                {{session('success')}}
            </div>
        @endif
        @yield('content')
    </div>
    <script>
      new TomSelect('select[multiple]',{plugins : {remove_button : {title : 'Supprimer'}}})
    </script>
</body>
</html>