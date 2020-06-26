<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

// $botman->hears('Hi', function ($bot) {
//     $bot->reply('Hello!');
// });


// $botman->hears('/name', function ($bot) {
//     $bot->reply('Johnson Towoju');
// });


$botman->hears('/start', 'App\Http\Controllers\CatBreedsController@start');

$botman->hears('/random', 'App\Http\Controllers\CatBreedsController@random');

// $botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->hears('start conversation', 'App\Http\Controllers\ConversationController@index');

$botman->hears('/b {breed}', 'App\Http\Controllers\CatBreedsController@byBreedID');

$botman->fallback('App\Http\Controllers\FallbackController@index');



