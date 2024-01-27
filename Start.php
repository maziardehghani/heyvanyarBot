<?php

require "Methods.php";
abstract class Start extends Message
{
    use Methods;
    private static string $startText = "لطفا اگهی خود را بفرستیداگهی باید شامل یک عکس(تصویر حیوان)و یک کپشن (توضیحات) باشد و حتما قیمت و شماره تماس را ذکر نمایید";

    public static function handle($chat_id): void
    {
        self::send($chat_id,self::$startText);
    }
}