<div class="movie">
    <div class="movie-poster">
        <img src="{{ $movie->poster_path }}">
    </div>
    <div class="movie-details">
        <h3>{{ $movie->title }}</h3>
        <span>{{ $movie->summary }}</span>
        <b>Rating: {{ $movie->rating }}/5</b>

        <x-carrousel>
            @foreach (json_decode($movie->actors) as $actor)
                <img data-actor="{{ $actor['name'] }}" src="{{ $actor['poster_url'] }}">
            @endforeach
        </x-carrousel>
    </div>
</div>