<?php

require "Actions/Start.php";
require "Actions/AdRegister.php";
require "jdate.php";

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
            AdRegister::handle($this->update['message']['from']['id'],
                $this->update['message']['message_id'],
                urlencode($this->update['message']['caption']."\n\n ".$this->addIdToCaption()."\n\n ".$this->addDateToCaption()."\n\n ".$this->addStatusToCaption()));

        $this->actions[$action]::handle($this->update['message']['from']['id']);

    }

    public function record($value): void
    {
        file_put_contents('result.json',json_encode($value));

    }

    public function addIdToCaption(): string
    {
        return "آیدی"."\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t".'@'.$this->update['message']['from']['username'];
    }
    public function addDateToCaption(): string
    {
        return "تاریخ"."\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t".jdate('Y/m/d',$this->update['message']['date']);
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