<?php

require_once "Trait/Methods.php";
require_once "Interface/ActionInterface.php";

class AdRegister implements ActionInterface
{
    use Methods;

    public static function handle(int $chat_id, $message_id=null): void
    {
        self::forward(-1001995214317,$chat_id,$message_id);
    }
}