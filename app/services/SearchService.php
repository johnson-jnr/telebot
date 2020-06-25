<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;


class SearchService
{
    // The endpoint we will be getting a random image from.
    const SEARCH_ENDPOINT = 'https://en.wikipedia.org/w/api.php';
    
    /**
     * Guzzle client.
     *
     * @var GuzzleHttp\Client
     */
    protected $client;

    /**
     * DogService constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client;
    }

    /**
     * Fetch and return a random image from all breeds.
     *
     * @return string
     */
    public function search($name)
    {
        try {




            $searchPage = $name;


            $response = Http::get('https://en.wikipedia.org/w/api.php', [
                'action' => 'query',
                'lsit' => 'search',
                'srsearch' => $searchPage,
                'format' => 'json'
            ]);

            return $response;


            // Decode the json response.
            // $response = json_decode(
            //     // Make an API call an return the response body.
            //     $this->client->request('GET', self::SEARCH_ENDPOINT, 
            //                             ['query' => [ "action" => "query", "list" => "search", "srsearch" => $searchPage, "format" => "json"]
            //     ])
            // );

            // Return the image URL.
            // return $response;
        } catch (Exception $e) {
            // If anything goes wrong, we will be sending the user this error message.
            return 'An unexpected error occurred. Please try again later.';
        }
    }

    /**
     * Fetch and return a random image from a given breed.
     *
     * @param string $breed
     * @return string
     */

    // public function byBreed($breed)
    // {
    //     try {
    //     // We replace %s    in our endpoint with the given breed name.
    //         $endpoint = sprintf(self::BREED_ENDPOINT, $breed);

    //         $response = json_decode(
    //             $this->client->get($endpoint)->getBody()
    //         );

    //         return $response->message;
    //     } catch (Exception $e) {
    //         return "Sorry I couldn\"t get you any photos from $breed. Please try with a different breed.";
    //     }
    // }
}