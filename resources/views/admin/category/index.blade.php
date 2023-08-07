@extends('admin.base')

@section('title','Tous les catégories')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{route('admin.category.create')}}" class="btn btn-primary">Ajouter une catégorie</a>
    </div>
    <table class="table table-striped">
        <tr>
            <th>Nom</th>
            <th class="text-end">Action</th>
        </tr>
            @foreach ($categories as $category)

                <tr>
                    <td>{{$category->label}}</td>
                    <td>
                        <div class="d-flex w-100 justify-content-end">
                            <a href="{{route('admin.category.edit',$category)}}" class="btn btn-primary">Editer</a>
                            <form action="{{route('admin.category.destroy',$category)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            
            @endforeach
    </table>
    {{$categories->links()}}
@endsection
    
