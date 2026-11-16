<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books', compact('books'));
    }

    public function create()
    {
        return view('book_create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required',
            'auteur' => 'required',
            'categorie' => 'nullable',
            'quantite' => 'required|integer|min:0',
        ]);

        Book::create($data);
        return redirect('/books');
    }

    public function edit(Book $book)
    {
        return view('book_edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'titre' => 'required',
            'auteur' => 'required',
            'categorie' => 'nullable',
            'quantite' => 'required|integer|min:0',
        ]);

        $book->update($data);
        return redirect('/books');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/books');
    }
}