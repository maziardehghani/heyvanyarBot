<?php
trait Methods
{
    private static string $url = 'https://api.telegram.org/bot6431848989:AAHrAikvk5GyFDRHDLq7pcN6Ig_lRvQ-ngc';
    public static function send($chatID, $text, $parse_mode='HTML'): void
    {
        file_get_contents(self::$url . "/sendMessage?chat_id=$chatID&text=$text&parse_mode=$parse_mode");
    }
    public static function sendWithButton($chatID, $text, $markup): void
    {
        file_get_contents(self::$url . "/sendMessage?chat_id=$chatID&text=$text&reply_markup=".json_encode($markup));
    }

    public static function forward($chatID, $from_chat_id,$message_id): void
    {
        file_get_contents(self::$url . "/forwardMessage?chat_id=$chatID&from_chat_id=$from_chat_id&message_id=$message_id&protect_content=true");

    }

    public static function copy($chatID, $from_chat_id,$message_id,$caption)
    {
        return file_get_contents(self::$url . "/copyMessage?chat_id=$chatID&from_chat_id=$from_chat_id&message_id=$message_id&protect_content=true&caption=$caption");

    }

    public static function photo($chatID,$photo,$caption): void
    {
        file_get_contents(self::$url . "/sendPhoto?chat_id=$chatID&photo=$photo&caption=$caption&protect_content=true");

    }

    public static function editCaption($chatID,$message_id,$caption): void
    {
        file_get_contents(self::$url . "/editMessageCaption?chat_id=$chatID&message_id=$message_id&caption=$caption");

    }
    public function checkLen($value)
    {
        return strlen($value) > 20 ? $value : false;
    }

    public function junkWord($value)
    {

    }

}