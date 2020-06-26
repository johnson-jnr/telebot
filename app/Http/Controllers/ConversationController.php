<?php

namespace App\Http\Controllers;
use App\Conversations\CatConversation;

use Illuminate\Http\Request;

class ConversationController extends Controller
{

	 /**
     * Create a new conversation.
     *
     * @return void
     */

    public function index($bot) {
    	$bot->startConversation(new CatConversation);
    }
}
