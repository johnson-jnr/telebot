<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});


$botman->hears('/start', function ($bot) {
    $bot->reply('Welcome to Johnson Bot, finally');
});


$botman->hears('/name', function ($bot) {
    $bot->reply('Johnson Towoju');
});

$botman->hears('/random', 'App\Http\Controllers\CatBreedsController@random');


$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->hears('/b {breed}', 'App\Http\Controllers\AllBreedsController@byBreed');

