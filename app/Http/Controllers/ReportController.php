<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function subscribe($bot) {


    	$user_id = $bot->getUser()->getId();
    	error_log($user_id);
        error_log('after');

        $bot->reply('Thanks for being taking the step to be a voice for the people');
    }

    public function unsunscribe($bot) {

    }
}
