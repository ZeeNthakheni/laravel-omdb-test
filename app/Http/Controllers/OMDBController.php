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
     * Display the specified resource.
     */
    public function show(string $imdbId)
    {
        // Make a request to the TMDB API, we use this because it works with imdb id's and tmdb id's
        $tmdbResponse = Http::get('https://api.themoviedb.org/3/movie/'.$imdbId.'?language=en-US&api_key='. env('TMDB_API_KEY'));

        // Initialize to empty string
        $omdbResponse = "";
        // Check if the request was successful
        if(!isset($tmdbResponse->json()["status_message"])){
            // Make a request to the OMDB API using the imdb id from the TMDB API, we do this because the OMDB API has more information that we need
            $omdbResponse = Http::get('https://www.omdbapi.com', [
                'i' => $tmdbResponse->json()["imdb_id"],
                'apikey' => env('OMDB_API_KEY'),
            ]);

            // Assign the result to the $result variable
            $result = $omdbResponse->json();
    
        }else{
            // Return the TMDB API error response
            $result = $tmdbResponse->json();
        }

        
        return view('movies.show')->with('movie', $result);
    }

}
