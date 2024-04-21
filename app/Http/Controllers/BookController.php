<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Books::all();
        return view('books.index', compact('books'));

        $booksQuery = Books::with('category');

        if ($request->has('category_id')) {
            $booksQuery->where('book_category_id', $request->input('category_id'));
        }

            $books = $booksQuery->get();
            $categories = \App\Models\BookCategory::all();

    return view('books.index', compact('books', 'categories'));

    }

    public function create()
    {
        $categories = \App\Models\BookCategory::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'book_category_id' => 'required|exists:book_categories,id',
        ]);

        Books::create($validatedData);
        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function show(Books $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Books $book)
    {
        $categories = \App\Models\BookCategory::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Books $book)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $book->update($validatedData);
        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Books $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}

