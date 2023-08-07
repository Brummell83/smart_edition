@extends('admin.base')

@section('title',$books->exists ? "Editer un livre" : "Créer un livre")

@section('content')
    <h1>@yield('title')</h1>
    <form class="vstack gap-2" action="{{route($books->exists ? 'admin.book.update' : 'admin.book.store',$books)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method($books->exists ? 'put' : 'post')

        <div class="row">
            @include('shared.input',['class'=>'col','label'=>'Nom du livre','name'=>'name','value'=>$books->name])
            <div class="col row">
                @include('shared.input',['class'=>'col','label'=>'Nombre de page','name'=>'nombre_page','value'=>$books->nombre_page])
            </div>
        </div>
        <label for="author">Genres</label>
        @php
            $genreIds = $books->genre()->pluck('id');
        @endphp
        <select name="genre[]" id="genre" class="col" multiple>
            <option value="" disabled>Selectionner un Auteur</option>
            @foreach ($genres as $genre)
                <option @selected($genreIds->contains($genre->id)) value="{{$genre->id}}">{{$genre->genre}}</option>
            @endforeach
        </select>
        @include('shared.input',['class'=>'col','type'=>'textarea','name'=>'description','value'=>$books->description])
        <div class="row">
            @include('shared.input',['class'=>'col','type'=>'date','label'=>'Date de publication','name'=>'date_pub','value'=>$books->date_pub])
        </div>
        @include('shared.select',['label'=>'Catégories','name'=>'category_id','value'=>$books,'multiple'=>true])
        <label for="author">Auteurs</label>
        <select name="author_id" id="author" class="form-control" >
            <option value="" disabled>Selectionner un Auteur</option>
            @foreach ($authors as $author)
                <option @selected(old('author_id',$books->author_id) == $author->id) value="{{$author->id}}">{{$author->name_author}}</option>
            @endforeach
        </select>
        @include('shared.input',['label'=>'Image','type'=>'file','name'=>'image','value'=>$books->image])
        @include('shared.input',['label'=>'Image 1 (facultatif)','type'=>'file','name'=>'image_one','value'=>$books->image_one])
        @include('shared.input',['label'=>'Image 2 (facultatif)','type'=>'file','name'=>'image_two','value'=>$books->image_two])
        @include('shared.input',['label'=>'Image 3 (facultatif)','type'=>'file','name'=>'image_three','value'=>$books->image_three])
        @include('shared.input',['label'=>'Image 4 (facultatif)','type'=>'file','name'=>'image_four','value'=>$books->image_four])
        <div>
            <button class="btn btn-primary">
                @if ($books->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>
@endsection
