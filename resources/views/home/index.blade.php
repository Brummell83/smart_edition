@extends('home')

@section('section-second')
<div class="container">
    <br>
    <div class="d-flex align-items-center">
        <div class="flex-grow-1 border-bottom border-dark mx-3"></div>
        <div>
            <h1 style="text-align: center; color:#000;">Nouveautés</h1>
        </div>
        <div class="flex-grow-1 border-bottom border-dark mx-3"></div>
    </div>
    <div class="row">
    @foreach ($books as $book)
        <div class="custom-card" style="width: 15rem;">
            <a href="{{route('home.show',['slug'=>$book->name,'book'=>$book->id])}}"><img src="{{ $book->imageUrl() }}" style="width:250px;height:350px" class="img-fluid" alt="Image"/><a>
            <div class="card-body" style="background-color: black;opacity:0.7;color:#fff;">
            <p class="card-text" style="text-align: center;font-size:25px;font-weigth:bold">{{$book->name}}</p>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection