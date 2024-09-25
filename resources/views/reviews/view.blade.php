@extends('templates.page')

@section('content')
    <section class="review-overview">
         <div class="movie-details" data-id="{{ $review->movie_id }}">
            <img class="movie-poster">
            <span class="movie-title"></span>
            <span class="movie-date"></span>
        </div>
        <div class="review-details">
            <h2>{{ $review->title }}</h2>
            <span class="review-user">door <b>{{ $review->creator->name }}</b></span>
            <span class="review-summary">{!! $review->description !!}</h2>
        </div>
        <div class="comments">
            <h3>Opmerkingen</h3>
            @if (Auth::check())
                <div class="new-comment">
                    <h4>Nieuwe opmerking</h4>
                    <form action="{{ route('comments.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="review-id" id="review-id" value="{{ $review->id }}" />
                        <textarea class="collapsed" name="comment-summary" id="comment-summary"></textarea>
                        <input type="submit" name="submit-comment" id="submit-comment" value="Toevoegen" />
                    </form>
                </div>
            @endif

            @foreach ($review->comments as $comment)
                <div class="comment">
                    <span class="comment-summary">{{ $comment->description }}</span>
                    <span class="comment-user"><b>{{ $comment->user->name }}</b></span>

                    @if (Auth::check())
                        <form action="{{ route('comments.destroy', $comment) }}" method="post">
                            @csrf
                            @method("DELETE")
                            
                            <button onclick="form.submit();"><x-icon iconCode="trash" /></button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </section>
@endsection
