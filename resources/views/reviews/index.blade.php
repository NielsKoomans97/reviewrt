@extends('templates.page')

@section('content')
    <div class="review-list">
        @foreach ($reviews as $review)
            <a class="review">
                <h3 class="title">{{ $review->title }}</h3>
                <span class="comment_count"><b>{{ count($review->comments) }}</b> opmerkingen</span>
                <span class="creator">Gemaakt door <b>{{ $review->creator->name }}</b></span>
            </a>
        @endforeach
    </div>
@endsection
