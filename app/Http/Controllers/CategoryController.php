<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        
        //get all categories
        return Category::all();
    }

    public function show(Category $category) {

        // show single category
        return $category;
    }

    public function store(Request $request) {

        // validate & create new category
        $data = $request->validate([
            'name' => 'required|string|unique:categories',
            'description' => 'nullable|string', // not mandatory
        ]);

        return Category::create($data);
    }

    public function update(Request $request, Category $category) {

        // validate & update the category
        $data = $request->validate([
            'name' => 'required|string|unique:categories,name,' . $category->id,
            'description' => 'nullable|string', // not mandatory
        ]);

        $category->update($data);
        return $category;
    }

    public function destroy(Category $category) {

        //delete specific category
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
