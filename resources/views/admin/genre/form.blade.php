@extends('admin.base')

@section('title',$genres->exists ? "Editer un genre" : "Créer un genre")

@section('content')
    <h1>@yield('title')</h1>
    <form class="vstack gap-2" action="{{route($genres->exists ? 'admin.genre.update' : 'admin.genre.store',$genres)}}" method="post">
        @csrf
        @method($genres->exists ? 'put' : 'post')

        <div class="row">
            @include('shared.input',['class'=>'col','label'=>'Genre','name'=>'genre','value'=>$genres->genre])
        </div>
        <div>
            <button class="btn btn-primary">
                @if ($genres->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>
@endsection
