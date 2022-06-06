<?php

class URLShortner
{
    private const API = 'https://ulvis.net/API/write/get';

    public static function short(string $url)
    {
        $urlParams = [
            'url' => $url
        ];

        $requestUrlMounted = self::API . '?' . http_build_query($urlParams);

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL            => $requestUrlMounted,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST  => 'GET',
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response)->data->url;
    }
}
