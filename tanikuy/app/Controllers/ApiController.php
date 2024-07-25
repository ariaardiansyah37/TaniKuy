<?php

namespace App\Controllers;

use jcobhams\NewsApi\NewsApi;

class ApiController extends BaseController
{
    protected $newsApi;

    public function __construct()
    {
        // Ganti dengan API key Anda
        $apiKey = 'e32f2ca131dd4bbaad1fced676e06369';
        $this->newsApi = new NewsApi($apiKey);
    }

    public function index()
    {
        $weatherApiKey = '27b885ebabf0c3158c6481937657967e';
        $latitude = '-6.9663';
        $longitude = '110.4194';
        $weatherUrl = "https://api.openweathermap.org/data/2.5/forecast?lat={$latitude}&lon={$longitude}&appid={$weatherApiKey}&units=metric";

        $client = \Config\Services::curlrequest();
        try {
            $weatherResponse = $client->get($weatherUrl);
            $weatherData = json_decode($weatherResponse->getBody(), true);

            // // Debugging
            // echo '<pre>';
            // print_r($weatherData);
            // echo '</pre>';
            // die();

            // Mendapatkan data berita
            $newsApiKey = 'fe571f7d50fd4ba9a40a36775edc0796';
            $q = 'pertanian Indonesia';
            $language = 'id';
            $newsUrl = "https://newsapi.org/v2/everything?q=" . urlencode($q) . "&apiKey={$newsApiKey}&language={$language}";

            $newsResponse = $client->get($newsUrl);
            $newsData = json_decode($newsResponse->getBody(), true);

            // Debugging
            echo '<pre>';
            print_r($newsData);
            echo '</pre>';
            die();

            // Cek apakah data berita valid
            if (isset($newsData['articles'])) {
                return view('user/berita', [
                    'weatherData' => $weatherData,
                    'newsData' => $newsData
                ]);
            } else {
                return view('user/berita', [
                    'weatherData' => $weatherData,
                    'error' => 'Data berita tidak tersedia.'
                ]);
            }
        } catch (\Exception $e) {
            return view('user/berita', [
                'weatherData' => $weatherData,
                'error' => 'Error fetching data: ' . $e->getMessage()
            ]);
        }
    }
}
