@extends('admin.base')

@section('title','Tous les genres')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{route('admin.genre.create')}}" class="btn btn-primary">Ajouter un genre</a>
    </div>
    <table class="table table-striped">
        <tr>
            <th>Genres</th>
            <th class="text-end">Action</th>
        </tr>
            @foreach ($genres as $genre)

                <tr>
                    <td>{{$genre->genre}}</td>
                    <td>
                        <div class="d-flex w-100 justify-content-end">
                            <a href="{{route('admin.genre.edit',$genre)}}" class="btn btn-primary">Editer</a>
                            <form action="{{route('admin.genre.destroy',$genre)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            
            @endforeach
    </table>
    {{$genres->links()}}
@endsection
    
