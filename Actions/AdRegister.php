<?php

require_once "Trait/Methods.php";
require_once "Interface/ActionInterface.php";

class AdRegister implements ActionInterface
{
    use Methods;

    public static function handle($update): void
    {
        $message = self::copy(-1001995214317,
            $update['message']['from']['id'],
            $update['message']['message_id'],
            urlencode($update['message']['caption']."\n\n ".self::addIdToCaption($update)."\n\n ".self::addDateToCaption($update)."\n\n ".self::addChannelToCaption()));

        self::sendWithButton($update['message']['from']['id'],'اگهی شما در کانال قرار گرفت برای لغو اگهی دکمه زیر را بزنید',[
            'inline_keyboard' => [
                [
                    [
                    'text' => json_decode($message, true)['result']['message_id'],
                    'callback_data' => 'cancelAd'
                    ]
                ]
            ]
        ]);
    }

    public static function addIdToCaption($update): string
    {
        return "🆔"."\t".'@'.$update['message']['from']['username'];
    }
    public static function addDateToCaption($update): string
    {
        return "📅"."\t".jdate('Y/m/d',$update['message']['date']);
    }

    public static function addChannelToCaption(): string
    {
        return "🔊"."\t"."@heyvanyar_ads";
    }
}