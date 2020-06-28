<?php

use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\Drivers\Telegram\TelegramDriver;
use Botman\Drivers\Web\WebDriver;
use Illuminate\Support\Facades\Log;


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrginateController extends Controller
{
    public function test() {

    	$botman = app('botman');

        // $res = $botman->say('Message', '1593291647358', TelegramDriver::class);

        $botman->sendRequest('sendMessage', [
          'chat_id' => '1593291647358',
          'text' => 'Message'
        ]);

        // dd($res);

        return 'done';
    }
}
