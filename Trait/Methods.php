<?php
trait Methods
{
    private static string $url = 'https://api.telegram.org/bot6431848989:AAHrAikvk5GyFDRHDLq7pcN6Ig_lRvQ-ngc';

    public static function send($chatID, $text, $parse_mode='HTML'): void
    {
        file_get_contents(self::$url . "/sendMessage?chat_id=$chatID&text=$text&parse_mode=$parse_mode");
    }

    public static function forward($chatID, $from_chat_id,$message_id): void
    {
        file_get_contents(self::$url . "/forwardMessage?chat_id=$chatID&from_chat_id=$from_chat_id&message_id=$message_id&protect_content=true");

    }

    public static function validation()
    {

    }

}