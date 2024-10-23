<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;


class TrendingMovies extends Component
{
    public $movies = [];

    public function render()
    {
        return view('livewire.trending-movies');
    }

    public function mount(){
         
        // Make a request to the TMDB API to get the popular movies because the OMDB API does not have a trending endpoint
        $response = Http::get('https://api.themoviedb.org/3/movie/popular?language=en-US&page=1&api_key=' . env('TMDB_API_KEY'));

        $result = $response->json();

        // Set the movies property
        $this->movies = $result["results"];
    }
}
