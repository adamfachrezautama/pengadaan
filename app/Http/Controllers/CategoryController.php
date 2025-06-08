<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\Store;
use App\Http\Requests\Admin\Categories\Update;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index(){
    //
    $categories = Category::all();
    $categories = Category::paginate(5);

    $query = request()->query('search');
    if ($query) {
        $categories = Category::where('description', 'ILIKE', "%{$query}%")
        ->paginate(5);
        $categories->appends(['search' => $query]);
    }
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Store $request)
    {
        Category::create($request->validated());

        return redirect()->route('categories.index')
                     ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function show(Category $category){
        abort(404);
    }

    public function edit(Category $category){
        return view('categories.edit', compact('category'));
    }

    public function update(Update $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('categories.index')->with('success', 'Kategori Berhasil Diperbaharui');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Kategori Berhasil dihapus');
    }


}
