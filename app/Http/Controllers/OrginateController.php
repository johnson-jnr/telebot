<?php

use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\Drivers\Telegram\TelegramDriver;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrginateController extends Controller
{
    public function test() {

    	$botman = app('botman');
        $botman->say('Message', '1593291647358', TelegramDriver::class);
    }
}
