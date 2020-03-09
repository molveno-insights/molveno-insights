<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(Request $request) {
        $categoryList = [];
        $query = Category::query();

        $search = $request->input('search');
        if ($query) {
            $query->where("name", "like", "%" . $search . "%");
        }

        $categoryList = $query->paginate(3);

        return view('category.index', ['categoryList' => $categoryList]);
    }

    public function show() {

    }
    public function create()
    {
        return view('category.create');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = new Category();
        $category->name = $request->input('name');

        if ($category->save()) {
            return redirect()->route('category.index');
        } else {
            var_dump("Failed to save!");
        }
    }

    public function edit(Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    public function update() {

    }

    public function delete() {
        
    }
}
