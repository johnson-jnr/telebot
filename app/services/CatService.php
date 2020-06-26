<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;


class CatService
{
    // The endpoint we will be getting a random image from.
    const RANDOM_ENDPOINT = 'https://api.thecatapi.com/v1/images/search';
    const RANDOM_NAMES = 'https://api.thecatapi.com/v1/breeds';
    const BREED_ENDPOINT = 'https://api.thecatapi.com/v1/images/search?breed_ids=';
    
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
        $this->client = new Client(['headers' => ['x-api-key' => '2b9740e3-825e-49d3-a2e2-cf938bcb207d']]);
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
                $this->client->get(self::RANDOM_ENDPOINT)->getBody()
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

    public function byBreedID($breedID)
    {
        try {
            // We replace %s in our endpoint with the given breed name.
            $endpoint = self::BREED_ENDPOINT . $breedID;

            $response = json_decode(
                $this->client->get($endpoint)->getBody()
            );
            return $response[0]->url;
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


    public function getRandomBreeds() {

        try {

            $request = $this->client->get(self::RANDOM_NAMES);

            $response = json_decode($request->getBody());
            $responseLength = count($response);

            $days = range(1, $responseLength);
            $res = shuffle($days);

                // dd($days);
            $names = array();

            for ($i = 0; $i < 4; $i++) {
                $names[] = array(
                    'id' => $response[$days[$i]]->id,
                    'name' => $response[$days[$i]]->name
                );
            }

            return $names;    

        } catch (Exception $e) {
            return 'Error' . $e;
        }
            

    }

}