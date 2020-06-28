<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function subscribe($bot) {


    	$user_id = $bot->getUser()->getId();
    	

        $bot->reply('Thanks for being taking the step to be a voice for the people');
    }

    public function unsunscribe($bot) {

    }
}
