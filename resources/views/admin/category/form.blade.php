@extends('admin.base')

@section('title',$categories->exists ? "Editer une catégorie" : "Créer une catégorie")

@section('content')
    <h1>@yield('title')</h1>
    <form class="vstack gap-2" action="{{route($categories->exists ? 'admin.category.update' : 'admin.category.store',$categories)}}" method="post">
        @csrf
        @method($categories->exists ? 'put' : 'post')

        <div class="row">
            @include('shared.input',['class'=>'col','label'=>'Nom de la catégorie','name'=>'label','value'=>$categories->label])
        </div>
        <div>
            <button class="btn btn-primary">
                @if ($categories->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>
@endsection
