@extends('templates.page')

@section('content')
    <div class="review-list">
        @foreach ($reviews as $review)
            <div class="review">
                <h3 class="title">{{ $review->title }}</h3>
                <span class="comment_count"><b>{{ count($review->comments) }}</b> opmerkingen</span>
                <span class="creator">Gemaakt door <b>{{ $review->creator->name }}</b></span>
                @if (Auth::check())
                    <a class="destroy-review" href="{{ route('reviews.destroy', $review) }}">Verwijderen<x-icon iconCode="trash" /></a>
                    <a class="edit-review" href="{{ route('reviews.edit', $review) }}">Bewerken<x-icon iconCode="pencil" /></a>
                @endif
                <a href="{{ route('reviews.show', $review) }}">Toon<x-icon iconCode="image" /></a>
            </div>
        @endforeach
    </div>
@endsection
