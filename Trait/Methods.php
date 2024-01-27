<?php
trait Methods
{
    private static string $url = 'https://api.telegram.org/bot6431848989:AAHrAikvk5GyFDRHDLq7pcN6Ig_lRvQ-ngc';

    public static function send($chatID, $text): void
    {
        file_get_contents(self::$url . "/sendMessage?chat_id=$chatID&text=$text");
    }

}