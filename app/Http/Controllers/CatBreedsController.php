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
    public function __construct()
    {
        $this->photos = new CatService;
    }

    /**
     * Return a random dog image from all breeds.
     *
     * @return void
     */
    public function random()
    {
        // $this->photos->random() is basically the photo URL returned from the service.
        // $bot->reply is what we will use to send a message back to the user.
        $response = $this->photos->random();
        bot->reply($response);
    }

    public function byBreed($bot, $name) {
    	$bot->reply($this->photos->byBreed($name));

    }

    public function example() {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://api.thecatapi.com/v1/images/search');
        $response = json_decode($request->getBody());

        dd($response);

    }

}