import { TmdbWrapper } from './tmdb.js';

async function FetchData(path) {
    let baseUrl = `https://api.themoviedb.org/3/${path}`;

    const data = await fetch(baseUrl, {
        method: 'GET',
        headers: {
            "Accept": "application/json",
            "Authorization": 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJmMDg3ZjcxOWFlZTMzNGE3ODdlYTQ3MmZkZTkyZTc2YyIsIm5iZiI6MTcyNjY3MjE1OS4xOTAxNzEsInN1YiI6IjYzZTU4ZTY2YTNkMDI3MDA5MTYwMzcyYyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.IyHngUbMb0zycCvrzwjDE2hC7HP2SwY8S2VSgr1DJT4',
        },
    });

    const json = await data.json();

    return json;
}

async function SetMovieDetails() {
    const movieDetailSection = document.querySelector('div.movie-details');
    const movieId = movieDetailSection.getAttribute('data-id');
    const data = await FetchData(`movie/${movieId}`);

    const poster = movieDetailSection.querySelector('.movie-poster');
    const title = movieDetailSection.querySelector('.movie-title');
    const date = movieDetailSection.querySelector('.movie-date');

    poster.setAttribute('src', `https://image.tmdb.org/t/p/w200${data['poster_path']}`);
    title.innerText = data['title'];
    date.innerText = data['release_date'];

    const tmdbWrapper = new TmdbWrapper('eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJmMDg3ZjcxOWFlZTMzNGE3ODdlYTQ3MmZkZTkyZTc2YyIsIm5iZiI6MTcyNjY3MjE1OS4xOTAxNzEsInN1YiI6IjYzZTU4ZTY2YTNkMDI3MDA5MTYwMzcyYyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.IyHngUbMb0zycCvrzwjDE2hC7HP2SwY8S2VSgr1DJT4');
    await tmdbWrapper.Search('movie', 'iron', 
        { 'page': 2 },
    );

}



function hasElement(query) {
    return document.querySelector(query) != null || document.querySelectorAll(query) != null;
}

if (hasElement('.create-form') || hasElement('.edit-form')) {
    const createFormSection = document.querySelector('.create-form');

    if (createFormSection != null) {
        if (hasElement('#movie-details')) {
            const movieNameInput = createFormSection.querySelector('#movie-name');
            const movieId = createFormSection.querySelector('#movie-id');
            const searchMovieButton = createFormSection.querySelector('.search-movie');

            searchMovieButton.addEventListener('click', async (event) => {
                const resultList = createFormSection.querySelector('.result-list');

                const data = await FetchData(`search/movie?query=${movieNameInput.value}`);
                const results = data.results;

                results.forEach(result => {
                    createMovieItem(resultList, result);
                });

                function createMovieItem(root, data) {
                    let movieItem = document.createElement('div');
                    movieItem.classList.add('movie', 'unselected');
                    movieItem.setAttribute('data-id', data['id']);

                    let poster = document.createElement('img');
                    poster.setAttribute('src', `https://image.tmdb.org/t/p/w200${data['poster_path']}`);
                    movieItem.appendChild(poster);

                    let title = document.createElement('h4');
                    title.className = 'title';
                    title.innerText = data['title'];
                    movieItem.appendChild(title);

                    let year = document.createElement('span');
                    year.className = 'year';
                    year.innerText = data['release_date'];
                    movieItem.appendChild(year);

                    movieItem.addEventListener('click', (event) => {
                        const movies = resultList.querySelectorAll('.movie');
                        movies.forEach(movie => {
                            movie.classList.replace('selected', 'unselected');
                        });

                        movieId.value = movieItem.getAttribute('data-id');
                        movieItem.classList.replace('unselected', 'selected');
                    });

                    root.appendChild(movieItem);
                }

            });
        }
    }
}

if (hasElement('section.movie-details')) {
    SetMovieDetails();
}

if (hasElement('#comment-summary')) {
    const commentSummary = document.querySelector('#comment-summary');

    commentSummary.addEventListener('click', () => {
        commentSummary.classList.replace('collapsed', 'expanded');
    });

    commentSummary.addEventListener('focusout', () => {
        commentSummary.classList.replace('expanded', 'collapsed');
    });
}
