<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Services\CatService;
use Illuminate\Support\Facades\Log;


class CatConversation extends Conversation
{
    /**
     * First question
     */

    // private $cats;

    public function __construct() {

        // $this->catService = new CatService;

        // $this->cats = (new CatService)->getRandomBreeds();
        // $data = $this->cats[0];
        // Log::info($this->cats[0]['name']);

        // Log::info($this->cats[0]['id']);
        // Log::info('after');
    }

    public function defaultQuestion() {
        // dd($this->cats);
        $question = Question::create('Hi there. Kindly Choose an option')
            ->addButtons([
                Button::create('Choose a Random Kitty Breed')->value('breed'),
                Button::create('Random Kitty Photo')->value('random'),
                Button::create('Cancel')->value('cancel')
            ]);

            // We ask our user the question.
        return $this->ask($question, function (Answer $answer) {
            // Did the user click on an option or entered a text?
            if ($answer->isInteractiveMessageReply()) {
                // We compare the answer to our pre-defined ones and respond accordingly.
                switch($answer->getValue()) {
                    case 'random':
                        $this->say((new App\Services\CatService)->random());
                        break;
                    case 'breed':
                        $this->getBreedNames();
                        $this->displayBreedNames();
                        break;
                    case 'cancel':
                        $this->say('Hope to see you around again');
                }
            }
        });

    }


    public function displayBreedNames() {
        $question = Question::create('Choose a Breed')
            ->addButtons([
                Button::create($this->cats[0]['name'])->value($this->cats[0]['id']),
                Button::create($this->cats[1]['name'])->value($this->cats[1]['id']),
                Button::create($this->cats[2]['name'])->value($this->cats[2]['id']),
                Button::create($this->cats[3]['name'])->value($this->cats[3]['id']),
                Button::create('Cancel')->value('cancel')

            ]);

        // We ask our user the question.
        return $this->ask($question, function (Answer $answer) {
            // Did the user click on an option or entered a text?
            if ($answer->isInteractiveMessageReply()) {
                // We compare the answer to our pre-defined ones and respond accordingly.
                // switch($answer->getValue()) {
                //     case 'random':
                //     $this->say((new App\Services\CatService)->random());
                //     break;
                //     case 'breed':
                //     $this->displayBreedName();
                //     break;
                //     case 'cancel':
                //     $this->say('Hope to see you around again');
                // }

                if ($answer->getValue() == 'cancel') {
                    $this->say('Hope to see you around again');
                } else {
                    $this->say((new App\Services\CatService)->byBreedID($answer->getValue()));
                }
            }
        });
    }

    public function getBreedNames() {
        $this->cats = (new CatService)->getRandomBreeds();
    }


    /**
     * Start the conversation
     */

    public function run()
    {
        $this->defaultQuestion();
    }
}
