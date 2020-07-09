<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index')->with('categories', Category::all());
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CreateCategoryRequest $request)
    {

        Category::create([
            'name' => $request->name
        ]);

        session()->flash('success', 'Category created successfully.');
        return redirect(route('categories'));
    }

    public function edit(Category $category)
    {
        return view('categories.create')->with('category', $category);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name
        ]);

        session()->flash('success', 'Category updated successfully.');
        return redirect(route('categories'));
    }

    public function destroy(Category $category)
    {
       if($category->posts->count() > 0) {
           session()->flash('errors', 'Category can not be deleted because it has some posts.');
           return redirect()->back();
       }

       $category->delete();
       session()->flash('success', 'Category deleted successfully.');
       return redirect('/categories');
    }
}
