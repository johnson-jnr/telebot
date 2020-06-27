<?php

namespace App\Http\Controllers;

use App\Services\CatService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;


class CatBreedsController extends Controller
{
    /**
     * Controller constructor
     * 
     * @return void
     */

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
        $bot->reply("<b>Welcome to Kitty</b>\n\nYou can control me by sending these commands\n\n/random - get random kitty photo\n/b (breed_name) - get a specific kitty breed photo\n\n'Start Conversation' - Let's have a chat 🙂", ['parse_mode' => 'HTML'] );
    }

    public function random($bot)
    {
        // $this->photos->random() is basically the photo URL returned from the service.
        // $bot->reply is what we will use to send a message back to the user.
        $response = $this->catService->random();
        $bot->reply($response);
    }

    public function byBreedID($bot, $breedID) {
        $response = $this->catService->byBreedID($breedID);
        $bot->reply($response);
    }

}