@extends('templates.page')

@section('content')
    <h2>Nieuwe review</h2>

    <section class="create-form">

        <div class="container">
            <form action="{{ route('reviews.store') }}" method="post">
                @csrf
                
                <div class="form-section movie-details">
                    <input type="hidden" name="movie-id" id="movie-id" />
                    <input type="text" name="movie-name" id="movie-name" />
                    <a class="search-movie"><x-icon iconCode="search" /></a>
                    <div class="result-list hidden"></div>
                </div>

                <div class="form-section review-details">
                    <div class="form-group">
                        <h4>Titel</h4>
                        <input type="text" name="review-title" id="review-title" />
                    </div>
                    <div class="form-group review-summary">
                        <h4>Samenvatting</h4>
                        <textarea name="review-summary" id="review-summary"></textarea>
                    </div>
                    <div class="form-group horizontal">
                        <input type="submit" value="Opslaan" name="review-submit" id="review-submit" />
                        <a href="{{ route('reviews.index') }}">Annuleren</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
