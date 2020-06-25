<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;

class CatService
{
    // The endpoint we will be getting a random image from.
    const RANDOM_ENDPOINT = 'https://api.thecatapi.com/v1/images/search';
    const BREED_ENDPOINT = 'https://dog.ceo/api/breed/%s/images/random';
    
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
    public function random()
    {


        try {
            // Decode the json response.

            // $response = json_decode(
            //     // Make an API call an return the response body.
            //     $this->client->get(self::RANDOM_ENDPOINT)
            // );

            $response = json_decode(
                $this->client->get('https://api.thecatapi.com/v1/images/search')->getBody()
            );

            // Return the image URL.
            return $response[0]->url;

        } catch (Exception $e) {
            // If anything goes wrong, we will be sending the user this error message.
            return 'Error ' . $e;
        }
    }

    /**
     * Fetch and return a random image from a given breed.
     *
     * @param string $breed
     * @return string
     */

    public function byBreed($breed)
    {
        try {
        // We replace %s    in our endpoint with the given breed name.
            $endpoint = sprintf(self::BREED_ENDPOINT, $breed);

            $response = json_decode(
                $this->client->get($endpoint)->getBody()
            );

            return $response->message;
        } catch (Exception $e) {
            return "Sorry I couldn\"t get you any photos from $breed. Please try with a different breed.";
        }
    }


    public function example() {
      $client = new \GuzzleHttp\Client();
      $request = $client->get('https://api.thecatapi.com/v1/images/search');
      $response = $request->getBody();

      dd($response);



  }
}