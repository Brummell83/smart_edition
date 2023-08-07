<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryFormRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index',[
            'categories'=>Category::paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        return view('admin.category.form',[
            'categories'=> $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryFormRequest $request)
    {
        Category::create($request->validated());
        return to_route('admin.category.index')->with('success','la catégorie a bien été enregistrer');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.form',[
            'categories'=>$category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryFormRequest $request, Category $category)
    {
        $category->update($request->validated());
        return to_route('admin.category.index')->with('success','la catégorie a bien été modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('admin.category.index')->with('success','la catégorie a bien été supprimer');
    }
}
