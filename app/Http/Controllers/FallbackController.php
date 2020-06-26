<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FallbackController extends Controller
{
     public function index($bot) {
        $bot->reply('Sorry, I did not understand these commands. Try: \'Start Conversation\'');
    }
}
