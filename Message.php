<?php
require 'Start.php';

class Message
{
    protected array $update;
    private array $buttons = [
        '/start' => 'Start',
        '/adRegister' => 'AdRegister'
    ];

    public function __construct($update)
    {
        $this->update = json_decode($update, true);
        $this->recordResults($update);
        $this->autoAction($this->update['message']['text']);
    }
    public function autoAction($button): void
    {
        $this->buttons[$button]::handle($this->update['message']['from']['id']);
    }

    public function recordResults($update): void
    {
        file_put_contents('result.json',$update);
    }

}