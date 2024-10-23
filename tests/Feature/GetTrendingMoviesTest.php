<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class GetTrendingMoviesTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_view_trending_movies()
    {
        // Create a user
        $user = User::factory()->create();

        // Fake the HTTP response
        $fakeMovies = [
            [
                'title' => 'The Matrix',
                'release_date' => '1999-03-31',
                'id' => 603,
                'poster_path' => '/matrix.jpg',
                'overview' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',
            ],
            // Add more fake movies if needed
        ];

        Http::fake([
            'https://api.themoviedb.org/3/movie/popular*' => Http::response([
                'results' => $fakeMovies,
            ], 200),
        ]);

        // Act as the created user and test the Livewire component
        $this->actingAs($user);

        Livewire::test('trending-movies')
            ->assertSet('movies', $fakeMovies);
    }
}
