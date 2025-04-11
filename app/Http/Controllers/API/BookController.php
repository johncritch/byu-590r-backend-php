<?php

namespace App\Http\Controllers\API;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends BaseController
{
    /**
     * Display a listing of the books.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        foreach ($books as $book) {
            $book->book_cover_picture = $this->getS3Url($book->book_cover_picture);
        }
        return $this->sendResponse($books, 'Books retrieved successfully.');
    }

    /**
     * Store a newly created book in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'book_cover_picture' => 'required|string'
        ]);

        $book = Book::create($validatedData);
        return $this->sendResponse($book, 'Book created successfully.');
    }
}
