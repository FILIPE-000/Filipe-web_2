<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          return Book::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
     'title' => 'required|string|max:255',
     'author_id' => 'required|exists:authors,id',
     'publisher_id' => 'required|exists:publishers,id',
     'category_id' => 'required|exists:categories,id',
     ]);
         $book = Book::create($request->all());
         return response()->json($book,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
            return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
          $request->validate([
        'title' => 'required|string|max:255',
        'author_id' => 'required|exists:authors,id',
        'publisher_id' => 'required|exists:publishers,id',
        'category_id' => 'required|exists:categories,id',]);
        
          $book->update($request->all());

           return response()->json($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
{
     $book->delete();
 
     return response()->json([
        'message'=>'Livro removido.'
     ]);
}
}
