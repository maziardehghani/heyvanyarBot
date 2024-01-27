<?php
require 'Core/Message.php';

//function bot( $method, $datas = [] )
//{
//    $url = '6431848989:AAHrAikvk5GyFDRHDLq7pcN6Ig_lRvQ-ngc';
//
//    $ch = curl_init( "https://api.telegram.org/bot" . $url . "/" . $method );
//    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
//    curl_setopt( $ch, CURLOPT_POSTFIELDS, $datas );
//    $result =json_decode(curl_exec( $ch ));
//    if (isset($result->ok) && $result->ok === false)
//        error_log("Telegram error: $result->description");
//    if (curl_error($ch)) {
//        error_log(curl_error($ch));
//        return json_decode('{}');
//
//    } else {
//        return $result;
//    }
//}

//var_dump(bot('editMessageCaption',[
//    'chat_id' => -1001995214317 ,
//    'message_id' => 622 ,
//    'caption' => 'hi' ,
//
//]));





new Message(file_get_contents('php://input'));
