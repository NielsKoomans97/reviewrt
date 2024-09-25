@extends('templates.page')

@section('content')
    <section class="edit-form">
        <h2>Bestaande review bewerken</h2>

        <form action="{{ route('reviews.update', $review) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="form-section movie-details" data-id="{{ $review->movie_id }}">
                <img class="movie-poster">
                <span class="movie-title"></span>
                <span class="movie-date"></span>
            </div>

            <div class="form-section review-details">
                <div class="form-group">
                    <h4>Titel</h4>
                    <input type="text" name="review-title" id="review-title" value="{{ $review->title }}" />
                </div>
                <div class="form-group review-summary">
                    <h4>Samenvatting</h4>
                    <textarea name="review-summary" id="review-summary">{{ $review->description }}</textarea>
                </div>
                <div class="form-group horizontal">
                    <input type="submit" value="Opslaan" name="review-submit" id="review-submit" />
                    <a href="{{ route('reviews.show', $review) }}">Annuleren</a>
                </div>
            </div>
        </form>
    </section>
@endsection
