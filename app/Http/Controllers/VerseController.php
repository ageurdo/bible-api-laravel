<?php

namespace App\Http\Controllers;

use App\Models\Verse;
use Illuminate\Http\Request;

class VerseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Verse::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if(Verse::create($request->all())){
            return response()->json([
                'message' => 'Verse was successfully created.'
            ], 201);
        }
        return response()->json([
            'message' => 'Error registering verse.'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $verse
     * @return \Illuminate\Http\Response
     */
    public function show($verse)
    {
        $hasVerse = Verse::find($verse);
        if ($hasVerse) {
            return $hasVerse;
        }

        return response()->json([
            'message' => 'Verse not found.'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $verse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $verse)
    {
       $hasVerse = Verse::find($verse);
        if ($hasVerse){
            $hasVerse->update($request->all());
            return $hasVerse;
        }

        return response()->json([
            'message' => 'Error updating verse.'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $verse
     * @return \Illuminate\Http\Response
     */
    public function destroy($verse)
    {
        if (Verse::destroy($verse)){
            return response()->json([
                'message' => 'Successfully deleted verse'
            ], 201);
        }
        
        return response()->json([
            'message' => 'Error deleting verse.'
        ], 404);
    }
}
