<?php
require 'Message.php';

//$updates = file_get_contents('php://input');
//
//file_put_contents('result.json',$updates);
//
//$data = json_decode($updates,true);
//
//
//$user_id = $data['message']['from']['id'];
//$chat_id = $data['message']['chat']['id'];
//$text = $data['message']['text'];

new Message(file_get_contents('php://input'));
//file_get_contents("https://api.telegram.org/bot6431848989:AAHrAikvk5GyFDRHDLq7pcN6Ig_lRvQ-ngc/sendMessage?chat_id=$chat_id&text=مازیار");
