<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year' => 'required|integer|min:1000|max:'.(date('Y') + 1),
            'edition' => 'required|integer|min:1',
            'isbn' => 'required|string|max:13|unique:books',
            'available' => 'required|boolean',
        ]);

        $book = new Book();
        $book->author = $request->author;
        $book->title = $request->title;
        $book->publisher = $request->publisher;
        $book->year = $request->year;
        $book->edition = $request->edition;
        $book->isbn = $request->isbn;
        $book->available = $request->available;
        $book->save();

        return redirect()->route('books.create')->with('success', 'Book added successfully');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'author' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year' => 'required|integer|min:1000|max:'.(date('Y') + 1),
            'edition' => 'required|integer|min:1',
            'isbn' => 'required|string|max:13|unique:books,isbn,'.$book->id,
            'available' => 'required|boolean',
        ]);

        $book->author = $request->author;
        $book->title = $request->title;
        $book->publisher = $request->publisher;
        $book->year = $request->year;
        $book->edition = $request->edition;
        $book->isbn = $request->isbn;
        $book->available = $request->available;
        $book->save();

        return redirect()->route('books.edit', $book)->with('success', 'Book updated successfully');
    }

    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }
    
}