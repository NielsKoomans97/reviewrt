@extends('templates.page')

@section('content')
<div class="review-details">
    <h2>{{ $review->title }}</h2>
    <span class="review-user">door <b>{{ $review->creator->name }}</b></span>
    <span class="review-summary">{{ $review->description }}</h2>
</div>
<div class="comments">
    <div class="new-comment">
    </div>
</div>
@endsection