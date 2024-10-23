<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;


class SearchMovies extends Component
{
    // e.g The Matrix
    public $movieTitle ="";
    // List of movies
    public $movies = [];
    // Total number of movies, to be used with pagination in phase 2
    public $totalMovies = "";


    public function render()
    {

        return view('livewire.search-movies');
    }

    public function submitForm()
    {
        // Get the movie title from the form
        $title = $this->movieTitle;

        // Check if the title is empty
        if(empty($title)){
            // Display a flash message
            request()->session()->flash('message', 'Please enter a movie title');
            return;
        }

        // Make a request to the OMDB API
        $response = Http::get('https://www.omdbapi.com', [
            's' => $title,
            'apikey' => env('OMDB_API_KEY'),
            'page' => 1,
            'type' => 'movie',
        ]);

        // Check if the request was successful
        $result = $response->json();
        if(!isset($result["Search"])){
            // Display a flash message
            request()->session()->flash('message', 'Error retrieving movies: ' . $result["Error"]);
            return;
        }

        // Set the movies and totalMovies properties
        $this->movies = $result["Search"];
        $this->totalMovies = $result["totalResults"];

        // Render the view
        return view('livewire.search-movies')
        ->with('movies', $this->movies)
        ->with('totalMovies', $this->totalMovies);

    }

}
