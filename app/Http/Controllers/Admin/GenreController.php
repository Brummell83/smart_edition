<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GenreFormRequest;
use App\Models\Genre;
use Illuminate\Http\Request;


class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.genre.index',[
            'genres'=>Genre::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre = new Genre();
        return view('admin.genre.form',[
            'genres'=> $genre
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GenreFormRequest $request)
    {
        Genre::create($request->validated());
        return to_route('admin.genre.index')->with('success','le genre a bien été enregistrer');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('admin.genre.form',[
            'genres'=>$genre
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GenreFormRequest $request, Genre $genre)
    {
        $genre->update($request->validated());
        return to_route('admin.genre.index')->with('success','le genre a bien été modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return to_route('admin.genre.index')->with('success','le genre a bien été supprimer');
    }
}
