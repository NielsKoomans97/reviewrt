@extends('templates.page')

@section('content')
    <section class="create-movies">
        <div class="container">
            <form method="post" action="{{ route('movies.store') }}">
                <x-form-group>
                    <label for="txMovieTitle">Naam film</label>
                    <input type="text" name="txMovieTitle" id="txMovieTitle">
                    <div class="result-list">
                    </div>
                </x-form-group>
                <x-form-group>
                    <label for="txSelectedMovie">Geselecteerde film</label>
                    <input type="text" name="txSelectedMovie" id="txSelectedMovie">
                </x-form-group>
            </form>
        </div>
    </section>
@endsection
