<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookCategory;

class BookCategoryController extends Controller
{
    public function index()
    {
        $categories = BookCategory::all();
        return view('categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:book_categories|max:255',
        ]);

        BookCategory::create($validatedData);
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(BookCategory $category)
    {
        return view('categories.edit', ['category' => $category]);
    }

    public function update(Request $request, BookCategory $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:book_categories,name,'.$category->id.'|max:255',
        ]);

        $category->update($validatedData);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(BookCategory $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
