<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ReportController extends Controller
{
    public function subscribe($bot) {



    	$user = $bot->getUser();
    	User::create([
    		'telegram_id' => $user->getId(),
    		'first_name' => $user->getFirstName(),
    		'last_name' => $user->getLastName(),
    		'subscribed' => true
    	]);

        $bot->reply('Thanks for being taking the step to be a voice for the people');
    }

    public function unsunscribe($bot) {

    }
}
