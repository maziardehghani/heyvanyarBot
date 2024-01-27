<?php
require_once "Trait/Methods.php";
require_once "Interface/ActionInterface.php";

class cancelAd implements ActionInterface
{
    use Methods;

    public static function handle($update ,$caption='✅ واگذار شده'): void
    {
        self::editCaption(-1001995214317,(int)$update['callback_query']['message']['reply_markup']['inline_keyboard'][0][0]['text'],$caption);
        self::send($update['callback_query']['from']['id'],'پیام اگهی شما لغو شد❌');
    }
}
