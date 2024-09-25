export class TmdbWrapper {
    BearerToken;

    constructor(bearerToken) {
        this.BearerToken = bearerToken;
    }

    async FetchJson(path) {
        let baseUrl = `https://api.themoviedb.org/3/${path}`;

        const data = await fetch(baseUrl, {
            method: 'GET',
            headers: {
                "Accept": "application/json",
                "Authorization": `Bearer ${this.BearerToken}`,
            },
        });

        const json = await data.json();

        return json;
    }

    async Search(type, query, options) {
        let basePath = `search/${type}?query=${query}`;

        for(var key in options){
            basePath += `&${key}=${options[key]}`;
        }

        const data = await this.FetchJson(basePath);

        return data;
    }

    
}