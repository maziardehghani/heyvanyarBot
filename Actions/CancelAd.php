<?php
require_once "Trait/Methods.php";
require_once "Interface/ActionInterface.php";

class cancelAd implements ActionInterface
{
    use Methods;

    public static function handle(int $chat_id, $message_id ,$caption='✅ واگذار شده'): void
    {
//        file_put_contents('result.json',json_encode($message_id,true));
//        die();
        self::editCaption($chat_id,$message_id,$caption);
    }
}