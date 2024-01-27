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

        $this->autoAction($this->update);

    }
    public function autoAction($action): void
    {
        if ($action['callback_query']['data'] === 'cancelAd')
            CancelAd::handle($this->update);

        if (!isset($action['message']['text']))
            AdRegister::handle($this->update);


        $this->actions[$action['message']['text']]::handle($this->update);
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