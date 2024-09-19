<?php

namespace Http\Wrappers;

class TmdbApi
{
    public string $BearerToken = '';
    public string $ApiKey = '';

    public function __construct(public string $apiKey)
    {
        $this->ApiKey = $apiKey;
    }

    public function fetch(string $path, array $params): string
    {
        $base = 'https://api.themoviedb.org/3/' . $path;

        if (isset($params) && !empty($params)) {
        }

        $headers = [
            "Authorization: Bearer " . $this->ApiKey,
            "Accept: application/json"
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $base);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return 'Error:' . curl_error($ch);
        } else {
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($httpCode == 200) {
                return $response;
            } else {
                return "HTTP Error: " . $httpCode;
            }
        }

        curl_close($ch);
    }

    public function GetMovieDetails(int $movieId): string
    {
        return $this->fetch('movie/' . $movieId, []);
    }
}
