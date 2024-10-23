<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OMDBController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard');
    }

    public function trending()
    {
        return view('movies.trending');
    }    
     
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $imdbId)
    {
        $tmdbResponse = Http::get('https://api.themoviedb.org/3/movie/'.$imdbId.'?language=en-US&api_key='. env('TMDB_API_KEY'));
        $omdbResponse = "";
        if(!isset($tmdbResponse->json()["status_message"])){
            $omdbResponse = Http::get('https://www.omdbapi.com', [
                'i' => $tmdbResponse->json()["imdb_id"],
                'apikey' => env('OMDB_API_KEY'),
            ]);
            $result = $omdbResponse->json();
    
        }else{
            $result = $tmdbResponse->json();
        }

        
        return view('movies.show')->with('movie', $result);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
