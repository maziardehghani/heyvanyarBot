<?php


require_once "Trait/Methods.php";
require_once "Interface/ActionInterface.php";

abstract class Start implements ActionInterface
{
    use Methods;

    private static string $startText = "لطفا اگهی خود را بفرستید اگهی باید شامل یک عکس(تصویر حیوان)و یک کپشن (توضیحات) باشد و حتما قیمت و شماره تماس را ذکر نمایید";

    public static function handle($update, $message_id=null ,$caption=null): void
    {
        self::send($update['message']['from']['id'], self::$startText);
    }
}