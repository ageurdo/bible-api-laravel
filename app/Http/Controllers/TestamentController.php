<?php

namespace App\Http\Controllers;

use App\Models\Testament;
use Illuminate\Http\Request;

class TestamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Testament::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Testament::create($request->all())){
            return response()->json([
                'message' => 'Testament was successfully created.'
            ], 201);
        }
        return response()->json([
            'message' => 'Error registering testament.'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $testament
     * @return \Illuminate\Http\Response
     */
    public function show($testament)
    {
        $hasTestament = Testament::find($testament);
        // retorno de array de testamentos e array de livros com relacionamentos
        if ($hasTestament) {
            $response = [
                'testament' => $hasTestament,
                'books' => $hasTestament->books
            ];

            return $response;
        }

        return response()->json([
            'message' => 'Testament not found.'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $testament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $testament)
    {
        $hasTestament = Testament::find($testament);
        if ($hasTestament){
            $hasTestament->update($request->all());
            return $hasTestament;
        }

        return response()->json([
            'message' => 'Error updating testament.'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $testament
     * @return \Illuminate\Http\Response
     */
    public function destroy($testament)
    {
        if (Testament::destroy($testament)){
            return response()->json([
                'message' => 'Successfully deleted testament'
            ], 201);
        }
        
        return response()->json([
            'message' => 'Error deleting testament.'
        ], 404);
    }
}
