<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

// $botman->hears('Hi', function ($bot) {
//     $bot->reply('Hello!');
// });


$botman->hears('/name', function ($bot) {
    $bot->reply('Johnson Towoju');
});


$botman->hears('/start', 'App\Http\Controllers\CatBreedsController@start');
$botman->hears('/random', 'App\Http\Controllers\CatBreedsController@random');


$botman->hears('/subscribe', 'App\Http\Controllers\ReportController@subscribe');
$botman->hears('/unsubscribe', 'App\Http\Controllers\ReportController@unsubscribe');


// $botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->hears('start conversation', 'App\Http\Controllers\ConversationController@index');

$botman->fallback('App\Http\Controllers\FallbackController@index');




