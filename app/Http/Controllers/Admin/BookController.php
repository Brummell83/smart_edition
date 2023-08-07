<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditBookFormRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\author;
use App\Models\Category;
use App\Models\Genre;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = new Book();
        return view('admin.book.index',[
            'books'=>$book->with('genre')->orderBy('created_at','desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $book = new Book();
        return view('admin.book.form',[
            'books'=> $book,
            'categories'=> Category::select('id','label')->get(),
            'authors'=> author::select('id','name_author')->get(),
            'genres'=> Genre::select('id','genre')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EditBookFormRequest $request,Book $book)
    {
        $book = new Book();
        $book->create($request->validated());
        return to_route('admin.book.index')->with('success','le livre a bien été enregistrer');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('admin.book.form',[
            'books'=>$book,
            'categories'=> Category::select('id','label')->get(),
            'authors'=> author::select('id','name_author')->get(),
            'genres'=> Genre::select('id','genre')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditBookFormRequest $request, Book $book)
    {
        $book->update($this->extractData($book,$request));
        $book->genre()->sync($request->validated('genre'));
        return to_route('admin.book.index')->with('success','le livre a bien été modifier');
    }
    private function extractData(Book $book,EditBookFormRequest $request) : Array
    {
        $data = $request->validated();
        $image = $request->validated('image');
        if($image === null || $image->getError()){
            return $data;
        }
        if($book->image){
            Storage::disk('public')->delete($book->image);
        }
        $data['image'] = $image->store('book','public');
        return $data;
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return to_route('admin.book.index')->with('success','le livre a bien été supprimer');
    }
}
