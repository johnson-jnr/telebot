<?php

namespace App\Http\Controllers;

use App\Services\CatService;
use App\Http\Controllers\Controller;


class CatBreedsController extends Controller
{
    /**
     * Controller constructor
     * 
     * @return void
     */

    const BREED_ENDPOINT = 'https://api.thecatapi.com/v1/images/search?breed_ids=';

    public function __construct()
    {
        $this->catService = new CatService;
    }

    /**
     * Return a random dog image from all breeds.
     *
     * @return void
     */


    public function start($bot) {
        $bot->reply("<b>Welcome to Kitty<b>\\n\nYou can control me by sending these commands\n\n/random - get random kitty photo\n/b (breed_name) - get a specific kitty breed photo\n\nStart Conversation - Let's have a chat 🙂");
    }

    public function random($bot)
    {
        // $this->photos->random() is basically the photo URL returned from the service.
        // $bot->reply is what we will use to send a message back to the user.
        $response = $this->catService->random();
        if ($response) {
            $bot->reply($response);

        } else {
            $bot->reply('Sorry no result for that breed, Try again');

        }
    }

    public function byBreedID($bot, $breedID) {
        $response = $this->catService->byBreedID($breedID);
        $bot->reply($response);
    }


    // public function example() {
    //     $client = new \GuzzleHttp\Client();
    //     $request = $client->get('https://api.thecatapi.com/v1/images/search');
    //     $response = json_decode($request->getBody());

    //     dd($response);

    // }

    // public function test() {


    //     // $response = $this->catService->getRandomBreeds();
    //     // dd($response);

    //     $client = new \GuzzleHttp\Client(['headers' => ['x-api-key' => '2b9740e3-825e-49d3-a2e2-cf938bcb207d']]);
    //     $request = $client->request('GET', 'https://api.thecatapi.com/v1/breeds');
    //     $response = json_decode($request->getBody());

    //     // dd($response);

    //     $responseLength = count($response);

    //     $days = range(1, $responseLength - 1 );
    //     $res = shuffle($days);

    //     // dd($days);
    //     $names = array();


    //     for ($i = 0; $i < 4; $i++) {
    //         $names[] = array(
    //             'id' => $response[$days[$i]]->id,
    //             'name' => $response[$days[$i]]->name);
    //     }

    //     dd($names);

    //     $values = array();
    //     foreach ($names as $name) {
    //         $values[] = array_values($name);
    //     }

    //     dd($values);

    //     // dd($names[0][0]);
    // }
    

}