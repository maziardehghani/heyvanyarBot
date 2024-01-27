<?php

require "Actions/Start.php";
require "Actions/AdRegister.php";
require "Actions/CancelAd.php";
require "jdate.php";

class Message
{
    protected array $update;

    private array $actions = [
        "/start" => 'Start',
        'cancelAd' => 'CancelAd'
    ];

    public function __construct($update)
    {
        $this->update = json_decode($update, true);

        $this->record($this->update);
//        $this->autoAction($this->update['message']['text']);
//        $this->autoAction($this->update['callback_query']['data']);
        $this->autoAction($this->update);

    }
    public function autoAction($action): void
    {
        if ($action['message']['text'] == '/start')
            Start::handle($this->update);

        elseif ($action['callback_query']['data'] === 'cancelAd')
            CancelAd::handle($this->update);

        elseif($action['message']['text'] != '/start' && $action['callback_query']['data'] != 'cancelAd')
            AdRegister::handle($this->update);

    }

    public function record($value): void
    {
        file_put_contents('result.json',json_encode($value,true));

    }
    public function __destruct()
    {
        $this->record($this->update);
    }
}