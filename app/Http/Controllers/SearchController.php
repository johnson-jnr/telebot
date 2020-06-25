<?php

namespace App\Http\Controllers;

use App\Services\SearchService;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Controller constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->wiki = new SearchService;
    }

    /**
     * Return a random dog image from all breeds.
     *
     * @return void
     */

    public function find()
    {
        // $this->photos->random() is basically the photo URL returned from the service.
        // $bot->reply is what we will use to send a message back to the user.
        $this->wiki->search('Nelson Mandela');
    }

    // public function byBreed($bot, $name) {
    // 	$bot->reply($this->photos->byBreed($name));

    // }

}