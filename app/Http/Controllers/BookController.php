<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Book::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Book::create($request->all())){
            return response()->json([
                'message' => 'Book was successfully created.'
            ], 201);
        }
        return response()->json([
            'message' => 'Error registering book.'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $book
     * @return \Illuminate\Http\Response
     */
    public function show($book)
    {
        $hasBook = Book::find($book);
        if ($hasBook) {
            $response = [
                'book' => $hasBook,
                'testament' => $hasBook->testament
            ];
            
            return $response;
        }

        return response()->json([
            'message' => 'Book not found.'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $book)
    {
        $hasBook = Book::find($book);
        if ($hasBook){
            $hasBook->update($request->all());
            return $hasBook;
        }

        return response()->json([
            'message' => 'Error updating book.'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($book)
    {
        if (Book::destroy($book)){
            return response()->json([
                'message' => 'Successfully deleted book'
            ], 201);
        }
        
        return response()->json([
            'message' => 'Error deleting book.'
        ], 404);
    }
}
