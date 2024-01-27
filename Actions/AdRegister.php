<?php

require_once "Trait/Methods.php";
require_once "Interface/ActionInterface.php";
require "Core/Validation.php";
class AdRegister implements ActionInterface
{
    use Methods;

    public static function handle($update)
    {
        $caption = self::Validation($update);

        if (!$caption)
            return null;

        $message = self::sendToChannel($update,$caption);

        self::sendCallback($update,$message);
    }
    private static function validation($update): string|bool
    {
        return (new Validation($update['message']['caption']))
            ->check_valid('checkLen')
            ->tap();
    }

    private static function sendToChannel($update,$caption): bool|string
    {
       return self::copy(-1001995214317,
            $update['message']['from']['id'],
            $update['message']['message_id'],
            urlencode($caption."\n\n ".self::addIdToCaption($update)."\n\n ".self::addDateToCaption($update)."\n\n ".self::addChannelToCaption()));

    }

    private static function addIdToCaption($update): string
    {
        return "🆔"."\t".'@'.$update['message']['from']['username'];
    }
    private static function addDateToCaption($update): string
    {
        return "📅"."\t".jdate('Y/m/d',$update['message']['date']);
    }

    private static function addChannelToCaption(): string
    {
        return "🔊"."\t"."@heyvanyar_ads";
    }

    private static function sendCallback($update, bool|string $message)
    {
        self::sendWithButton($update['message']['from']['id'],'❌ برای لغو اگهی دکمه زیر را بزنید❌',[
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
}