<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthorFormRequest;
use App\Models\author as ModelsAuthor;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.author.index',[
            'authors'=>ModelsAuthor::paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $author = new ModelsAuthor();
        return view('admin.author.form',[
            'authors'=> $author
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorFormRequest $request)
    {
        ModelsAuthor::create($request->validated());
        return to_route('admin.author.index')->with('success','l\'auteur a bien été enregistrer');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModelsAuthor $author)
    {
        return view('admin.author.form',[
            'authors'=>$author
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorFormRequest $request, ModelsAuthor $author)
    {
        $author->update($request->validated());
        return to_route('admin.author.index')->with('success','l\'auteur a bien été modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelsAuthor $author)
    {
        $author->delete();
        return to_route('admin.author.index')->with('success','l\'auteur a bien été supprimer');
    }
}
