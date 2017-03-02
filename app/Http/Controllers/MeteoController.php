<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Requests;

class MeteoController extends Controller
{
    public function index($location) {
        $infos = [
            'base_uri' => 'http://api.openweathermap.org/data/2.5/',
            'token' => getenv('API_TOKEN_METEO')
        ];
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $infos['base_uri'],
            'defaults' => [
                'exceptions' => false
            ],
            'timeout'  => 2.0,
        ]);

        $response = $client->request('GET',  'weather?q=' . $location . '&appid=' . $infos['token']);

        return new JsonResponse(json_decode($response->getBody()));
    }
}
