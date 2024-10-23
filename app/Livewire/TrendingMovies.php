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
         
        $response = Http::get('https://api.themoviedb.org/3/movie/popular?language=en-US&page=1&api_key=' . env('TMDB_API_KEY'));

        $result = $response->json();

        $this->movies = $result["results"];
    }
}
