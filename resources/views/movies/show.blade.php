<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Movie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ( isset($movie["status_message"]))
                    <div class="alert alert-danger">
                        <h3>Invalid movie ID provided.</h3>                    
                    </div>
                    @else
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <div class="flex flex-col ml-4">
                                <h1 class="text-3xl font-bold">{{$movie["Title"]}}</h1>
                                <p class="text-lg"><strong>Release Date:</strong> {{$movie["Released"]}}</p>
                                <p class="text-lg"><strong>Movie Rating:</strong> {{$movie["Rated"]}}</p>
                                <p class="text-lg"><strong>Movie Runtime:</strong> {{$movie["Runtime"]}}</p>
                                <p class="text-lg"><strong>Genre:</strong> {{$movie["Genre"]}}</p>
                                <p class="text-lg"><strong>Director:</strong> {{$movie["Director"]}}</p>
                                <p class="text-lg"><strong>Writer:</strong> {{$movie["Writer"]}}</p>
                                <p class="text-lg"><strong>Actors:</strong> {{$movie["Actors"]}}</p>
                                <p class="text-lg"><strong>Plot Summary:</strong> {{$movie["Plot"]}}</p>
                                <p class="text-lg"><strong>Languages:</strong> {{$movie["Language"]}}</p>
                                <p class="text-lg"><strong>Country:</strong> {{$movie["Country"]}}</p>
                                <p class="text-lg"><strong>Awards:</strong> {{$movie["Awards"]}}</p>
                                <p class="text-lg"><strong>Metascore:</strong> {{$movie["Metascore"]}}</p>
                                <p class="text-lg"><strong>Imdb Rating:</strong> {{$movie["imdbRating"]}}</p>
                    @endif


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
