@extends('admin.base')

@section('title','Tous les auteurs')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{route('admin.author.create')}}" class="btn btn-primary">Ajouter un auteur</a>
    </div>
    <table class="table table-striped">
        <tr>
            <th>Nom de l'auteur</th>
            <th>Biographie</th>
            <th class="text-end">Action</th>
        </tr>
            @foreach ($authors as $author)
                <tr>
                    <td>{{$author->name_author}}</td>
                    <td>{{$author->biographie}}</td>
                    <td>
                        <div class="d-flex w-100 justify-content-end">
                            <a href="{{route('admin.author.edit',$author)}}" class="btn btn-primary">Editer</a>
                            <form action="{{route('admin.author.destroy',$author)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            
            @endforeach
    </table>
    {{$authors->links()}}
@endsection
    
