<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;


class SearchMovies extends Component
{
    public $movieTitle ="";
    public $movies = [];
    public $totalMovies = "";


    public function render()
    {

        return view('livewire.search-movies');
    }

    public function submitForm()
    {
        $title = $this->movieTitle;

        if(empty($title)){
            request()->session()->flash('message', 'Please enter a movie title');
            return;
        }

        $response = Http::get('https://www.omdbapi.com', [
            's' => $title,
            'apikey' => env('OMDB_API_KEY'),
            'page' => 1,
            'type' => 'movie',
        ]);

        $result = $response->json();
        if(!isset($result["Search"])){
            request()->session()->flash('message', 'Error retrieving movies: ' . $result["Error"]);
            return;
        }

        $this->movies = $result["Search"];
        $this->totalMovies = $result["totalResults"];

        return view('livewire.search-movies')
        ->with('movies', $this->movies)
        ->with('totalMovies', $this->totalMovies);

    }

}
