@extends('admin.base')

@section('title',$authors->exists ? "Editer un auteur" : "Créer un auteur")

@section('content')
    <h1>@yield('title')</h1>
    <form class="vstack gap-2" action="{{route($authors->exists ? 'admin.author.update' : 'admin.author.store',$authors)}}" method="post">
        @csrf
        @method($authors->exists ? 'put' : 'post')

        <div class="row">
            @include('shared.input',['class'=>'col','label'=>'Nom','name'=>'name_author','value'=>$authors->name_author])
            @include('shared.input',['class'=>'col','label'=>'Biographie','name'=>'biographie','value'=>$authors->biographie])
        </div>
        <div>
            <button class="btn btn-primary">
                @if ($authors->exists)
                    Modifier une option
                @else
                    Créer une option
                @endif
            </button>
        </div>
    </form>
@endsection
