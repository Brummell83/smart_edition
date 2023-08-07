@extends('baseHome')
@section('showbook')
    <div class="container mt-5 d-flex">
        <img src="{{$books->imageUrl()}}" class="img-book" alt="">
        <div class="container" style="margin-left:60px">
            <h1>{{$books->name}}</h1>
            @foreach ($author as $item)
                <p>Par <i>{{$item->name_author}}</i></p>
            @endforeach
            <br>
            <p>{{$books->description}}</p>
            <br><br><br>
            <div class="d-flex align-items-center">
                <div>
                  <h3>A propos du livre</h3>
                </div>
                <div class="flex-grow-1 border-bottom border-dark mx-3"></div>
            </div>
            <br>
            <div class="d-flex">
                <div>
                    <h5 style="color:#ccc">Nombre de pages : <span style="color:#000">{{$books->nombre_page}}</span></h5>
                    <hr>
                </div>
                <div class="mx-5">
                    <h5 style="color:#ccc">Date de publication : <span style="color:#000">{{$books->date_pub}}</span></h5>
                    <hr>
                </div>
            </div>
            <div class="d-flex">
                <div>
                    @foreach ($category as $item)
                        <h5 style="color:#ccc">Type : <span style="color:#000">{{$item->label}}</span></h5>
                    @endforeach
                    <hr>
                </div>
                <div class="" style="margin-left:135px">
                    <h5 style="color:#ccc">Date de publication : <span style="color:#000">{{$books->date_pub}}</span></h5>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@endsection