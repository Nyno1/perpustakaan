<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required|string',
            'penulis' => 'required|string',
            'kategori' => 'required|string',
            'status' => 'required|boolean',
            'tahun_terbit' => 'required|integer',
            'jumlah_stok' => 'required|integer',
            'deskripsi' => 'required|string',
        ]);
            
        Book::create($request->all());

        return redirect("books");
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'judul_buku' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'status' => 'required|boolean',
            'tahun_terbit' => 'required|integer',
            'jumlah_stok' => 'required|integer',
            'deskripsi' => 'nullable|string',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index');
    }

}
