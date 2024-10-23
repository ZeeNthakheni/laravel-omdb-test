<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class GetMoviesTest extends TestCase
{
    use RefreshDatabase;


    public function test_authenticated_user_can_search_movies()
    {
        // Create a user
        $user = User::factory()->create();

        // Fake the HTTP response
        $fakeMovies = [
            [
                'Title' => 'The Matrix',
                'Year' => '1999',
                'imdbID' => 'tt0133093',
                'Type' => 'movie',
                'Poster' => 'https://example.com/matrix.jpg',
            ],
            // Add more fake movies if needed
        ];

        Http::fake([
            'https://www.omdbapi.com*' => Http::response([
                'Search' => $fakeMovies,
                'totalResults' => 1,
            ], 200),
        ]);

        // Act as the created user and test the Livewire component
        $this->actingAs($user);

        Livewire::test('search-movies')
            ->set('movieTitle', 'The Matrix')
            ->call('submitForm')
            ->assertSet('movies', $fakeMovies)
            ->assertSet('totalMovies', 1);
    }
}
