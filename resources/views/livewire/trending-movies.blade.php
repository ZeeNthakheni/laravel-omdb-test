<div>
    @if (count($movies) > 0)
        @foreach ($movies as $movie)
            <p class = "py-1"><a href="/movie/{{$movie['id']}}">{{$movie['title']}} - {{$movie['release_date']}} - click to view</a></p>
        @endforeach
    @else
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h3>Trending Movies</h3>
            <p>Sorry, no trending movies found.</p>
        </div>
    @endif
</div>
