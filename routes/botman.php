<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});


$botman->hears('/start', function ($bot) {
    $bot->reply('Welcome to Johnson Bot, finally');
});


$botman->hears('Start conversation', BotManController::class.'@startConversation');
