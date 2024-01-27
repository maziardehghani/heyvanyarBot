<?php

require "Actions/Start.php";
require "Actions/AdRegister.php";

class Message
{
    protected array $update;
    private array $actions = [
        "/start" => 'Start',
    ];

    public function __construct($update)
    {
        $this->update = json_decode($update, true);

        $this->autoAction($this->update['message']['text']);

    }
    public function autoAction($action): void
    {
        if (!isset($this->actions[$action]))
            AdRegister::handle($this->update['message']['from']['id'],$this->update['message']['message_id']);

        $this->actions[$action]::handle($this->update['message']['from']['id']);

    }

    public function record($value): void
    {
        file_put_contents('result.json',json_encode($value));

    }

    public function __destruct()
    {
        $this->record($this->update);
    }
}