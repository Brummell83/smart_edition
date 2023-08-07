<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\author;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = new Book();
        return view('home.index',[
            'books'=> $book->paginate(10)
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug,Book $book)
    {
        $books = Book::findOrFail($book->id);
        $id_author = $books->author()->pluck('id');
        $author = author::findOrFail($id_author);
        $id_cat = $books->category()->pluck('id');
        $category = Category::findOrFail($id_cat);
        return view("home.show",[
            'books'=>$books,
            'author'=>$author,
            'category'=>$category
        ]);
    }
    public function catalog(){
        $category = Category::all();
        return view('home.catalogue',[
            'category'=>$category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
