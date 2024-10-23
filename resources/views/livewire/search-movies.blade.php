<div>
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h3>Search Movies</h3>

        @if (session('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit="submitForm" method="POST" name="search-form">
            @csrf
            <div class="d-flex">
                <input wire:model ="movieTitle" class="form-control" type="search" style="display: block;width: 100%;" placeholder="Search for title" name="title"/>
                <button class="btn btn-primary float-end" type="submit">Search</button>
            </div>
        </form>

        @if (count($movies) > 0)
            @foreach ($movies as $movie)
                <p class = "py-1"><a href="/movie/{{$movie['imdbID']}}">{{$movie['Title']}} - {{$movie['Year']}} - click to view</a></p>
            @endforeach
        @endif


    </div>
</div>
