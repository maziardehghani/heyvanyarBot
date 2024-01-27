<?php

require_once "Trait/Methods.php";
require_once "Interface/ActionInterface.php";

class AdRegister implements ActionInterface
{
    use Methods;

    public static function handle(int $chat_id, $message_id ,$caption,$channel_id =-1001995214317,): void
    {
        self::copy($channel_id,$chat_id,$message_id,$caption);
        self::sendWithButton($chat_id,'اگهی شما در کانال قرار گرفت برای لغو اگهی دکمه زیر را بزنید',[
            'inline_keyboard' => [
                [
                    [
                    'text' => 'لغو آگهی ❌',
                    'callback_data' => 'cancelAd'
                    ]
                ]
            ]
        ]);
    }

}