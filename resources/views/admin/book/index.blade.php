@extends('admin.base')

@section('title','Tous les livres')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{route('admin.book.create')}}" class="btn btn-primary">Ajouter un livre</a>
    </div>
    <table class="table table-striped">
        <tr>
            <th>Nom</th>
            <th>description</th>
            <th>genres</th>
            <th>nombre de page</th>
            <th>date de publication</th>
            <th class="text-end">Action</th>
        </tr>
            @foreach ($books as $book)

                <tr>
                    <td>{{$book->name}}</td>
                    <td>{{$book->description}}</td>
                    <td>
                        @if (!$book->genre->isEmpty()){
                            @foreach ($book->genre as $genre)
                                <span class="badge bg-secondary">{{$genre->genre}}</span>
                            @endforeach
                        }
                        @endif
                    </td>
                    <td>{{$book->nombre_page}}</td>
                    <td>{{$book->date_pub}}</td>
                    <td>
                        <div class="d-flex w-100 justify-content-end">
                            <a href="{{route('admin.book.edit',$book)}}" class="btn btn-primary">Editer</a>
                            <form action="{{route('admin.book.destroy',$book)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            
            @endforeach
    </table>
    {{$books->links()}}
@endsection
    
