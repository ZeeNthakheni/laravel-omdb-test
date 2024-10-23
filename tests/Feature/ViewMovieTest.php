<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViewMovieTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_view_movie_details()
    {
        // Create a user
        $user = User::factory()->create();

        // Fake the HTTP responses
        $tmdbResponse = [
            'imdb_id' => 'tt0133093',
            'title' => 'The Matrix',
            'release_date' => '1999-03-31',
            'id' => 603,
            'poster_path' => '/matrix.jpg',
            'overview' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',
        ];

        $omdbResponse = [
            'Title' => 'The Matrix',
            'Year' => '1999',
            'Rated' => 'R',
            'Released' => '31 Mar 1999',
            'Runtime' => '136 min',
            'Genre' => 'Action, Sci-Fi',
            'Director' => 'Lana Wachowski, Lilly Wachowski',
            'Writer' => 'Lilly Wachowski, Lana Wachowski',
            'Actors' => 'Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss',
            'Plot' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',
            'Language' => 'English',
            'Country' => 'USA',
            'Awards' => 'Won 4 Oscars. Another 37 wins & 51 nominations.',
            'Poster' => 'https://example.com/matrix.jpg',
            'Metascore' => '73',
            'imdbRating' => '8.7',
            'imdbVotes' => '1,648,711',
            'imdbID' => 'tt0133093',
            'Type' => 'movie',
            'DVD' => '21 Sep 1999',
            'BoxOffice' => '$171,479,930',
            'Production' => 'Warner Bros. Pictures',
            'Website' => 'N/A',
            'Response' => 'True',
        ];

        Http::fake([
            'https://api.themoviedb.org/3/movie/*' => Http::response($tmdbResponse, 200),
            'https://www.omdbapi.com*' => Http::response($omdbResponse, 200),
        ]);

        // Act as the created user and test the show method
        $this->actingAs($user);

        $response = $this->get('/movie/tt0133093');

        $response->assertStatus(200)
                 ->assertViewIs('movies.show')
                 ->assertViewHas('movie', $omdbResponse);
    }
}
