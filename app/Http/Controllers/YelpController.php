<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

use App\Http\Requests;

class YelpController extends Controller
{
    private function getApiInfos() {
        return [
            'base_uri' => 'https://api.yelp.com/v3/businesses/search',
            'token' => getenv('API_TOKEN_YELP')
        ];
    }

    private function getCategories($type) {
        $categories = 'categories=';
        switch ($type) {
            case 'restos' :
                $categories .= 'food';
                break;
            case 'events' :
                $categories .= 'adultentertainment';
                break;
            default :
                $categories = '';
        }
        return $categories;
    }

    private function callApi($terms) {
        $api = $this->getApiInfos();
        $client = new Client([
            'base_uri' => $api['base_uri'],
            'defaults' => [
                'exceptions' => false
            ],
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', '?' . $terms, [
            'headers' => [
                'authorization' => 'Bearer ' . $api['token']
            ]
        ]);

        return JsonResponse::create(json_decode($response->getBody()));
    }

    public function restos($location) {
        $categories = $this->getCategories('restos');
        $terms = $categories . '&location=' . $location;
        return $this->callApi($terms);
    }

    public function events($location) {
        $categories = $this->getCategories('events');
        $terms = $categories . '&location=' . $location;
        return $this->callApi($terms);
    }
    /*public function index($location) {
        $api = $this->getApiInfos();
        $terms = 'location=' . $location;
        $client = new Client([
            'base_uri' => $api['base_uri'],
            'defaults' => [
                'exceptions' => false
            ],
            'timeout'  => 2.0,
        ]);

        $response = $client->request('GET', '?' . $terms, [
            'headers' => [
                'authorization' => 'Bearer ' . $api['token']
            ]
        ]);

        return JsonResponse::create(json_decode($response->getBody()));
    }*/
}
