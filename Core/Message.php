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
//        $this->record($this->update);
//        die();
        $this->autoAction($this->update['message']['text']);

    }
    public function autoAction($action): void
    {
        if (!isset($this->actions[$action]))
            AdRegister::handle($this->update['message']['from']['id'],
                $this->update['message']['message_id'],
                urlencode($this->update['message']['caption']."\n\n ".$this->addIdToCaption()."\n\n ".$this->addDateToCaption()."\n\n ".$this->addChannelToCaption()));

        $this->actions[$action]::handle($this->update);

    }

    public function record($value): void
    {
        file_put_contents('result.json',json_encode($value,true));

    }

    public function addIdToCaption(): string
    {
        return "🆔"."\t".'@'.$this->update['message']['from']['username'];
    }
    public function addDateToCaption(): string
    {
        return "📅"."\t".jdate('Y/m/d',$this->update['message']['date']);
    }

    public function addChannelToCaption(): string
    {
        return "🔊"."\t"."@heyvanyar_ads";
    }
    public function addStatusToCaption(): string
    {
        return "وضعیت"."\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t".'✅ واگذار شده';
    }
    public function status():string
    {
        return "             ".'واگذار شده';
    }
    public function __destruct()
    {
        $this->record($this->update);
    }
}