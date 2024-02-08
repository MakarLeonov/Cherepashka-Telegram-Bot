<?php

namespace App\Telegram;
use App\Telegram\Telegraph;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use Illuminate\Support\Stringable;

class Handler extends WebhookHandler 
{
    public function start(): void
    {
        $this->reply('Ах вот кто! Ну и что ты от меня хочешь??');
    }
    
    public function hello(): void
    {
        $this->reply('Ну привет...');
    }

    public function play(): void
    {
        $this->reply('Я, по-твоему, буду в съедобное-несъедобное с тобой играть? Тем более несъедобное... Уходи и без лазерной указки не возвращайся...





\*на самом деле ей хочется поиграть, развесели её, поскидывай ей забавных смайликов\*');
    }

    protected function handleChatMessage(Stringable $text): void
    {
        $play_messages = [
            'Это я, когда никого нет дома',
            'Это папа, когда узнал, что я снова спала у Сашули',
            'А ЧТО!? Кто-то включил лазерную указку???',
            'Такими я вижу всех остальных в этом доме...',
            'Проверено опытом: еда в миске соседа вкуснее',
            'У меня жизнь... иногда хипиш, иногда кайфую, иногда вот так хаваю...'
        ];

        $random_answer = array_rand($play_messages, 1);
        $this->reply($play_messages[$random_answer] . $text);
    }

    // public function tease(): void
    // {
    //     Telegraph::message('hello world')
    //     ->keyboard(Keyboard::make()->buttons([
    //             // Button::make('Delete')->action('delete')->param('id', '42'),
    //             Button::make('open')->url('https://test.it'),
    //             Button::make('open')->url('https://test.it'),
    //     ]))->send();
    // }

    public function goodbye(): void
    {
        $goodbye_messages = [
            '\*обидчиво сидит на подоконнике\*',
            '\*агрессивно делает тыг-дык\*',
            '\*бежит пискляво жаловаться папе\*',
            '\*кусает исподтишка и смывается прочь\*',
        ];

        $random_answer = array_rand($goodbye_messages, 1);
        $this->reply($goodbye_messages[$random_answer]);
    }

    protected function handleUnknownCommand(Stringable $text): void
    {
        $this->reply('Я не собака, чтобы подчиняться командам...');
    }
}