@extends('templates.page')

@section('content')
    <section class="top-five-movies">
        <div class="container">
            <x-carrousel item-size="normal">
                @for ($i = 0; $i < 10; $i++)
                    <div class="movie">

                        <h4>I have osteoporosis</h4>

                    </div>
                @endfor
            </x-carrousel>
        </div>
    </section>
@endsection
