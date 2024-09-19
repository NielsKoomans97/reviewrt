class TmdbApi {
    ApiKey;

    constructor(apiKey) {
        this.ApiKey = apiKey;
    }

    async FetchData(path, params) {
        let baseUrl = `https://api.themoviedb.org/3/${path}`;

        if (params != null) {
            let param = params[0];
            baseUrl += `?${param['key']}=${param['value']}`;

            if (params.length > 0) {
                for (let i = 1; i < params.length; i++) {
                    baseUrl += `&${param['key']}=${param['value']}`;
                }
            }
        }

        const data = await fetch(baseUrl, {
            method: 'GET',
            headers: {
                "Content-Type": "application/json",
                "Authorization": 'Bearer ad0d9fbb5b8bf587e018289a323a9b35',
            },
        });

        const response = await data.response;
        const json = await response.json;

        return json;
    }

    async SearchMovie(query, page) {
        let params = [];
        params.push('query', query);
        params.push('include_adult', true);
        params.push('page', page);

        return await this.FetchData('search/movie', params);
    }
}