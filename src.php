<?php

define('api', 'https://api.telegram.org/bot'.token.'/');

$content = file_get_contents("php://input");
$update = json_decode($content, true);

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";

$cbid = $update['callback_query']['from']['update'];
$cbdata = $update['callback_query']['data'];

$msgid = $update['callback_query']['message']['message_id'];

function callback($up){
	return $up["callback_query"]; 
}

function request($method){
        $req = file_get_contents(api.$method);
        return $req;     
}

function sendMess($id, $urltext){
        if(strpos($urltext, "\n")){
		$urltext = urlencode($urltext);
	}
	return request("sendMessage?text=$urltext&parse_mode=HTML&chat_id=$id");
}

function inlinekeyboard($layout, $id, $msgtext){
        if(strpos($msgtext, "\n")){
		$msgtext = urlencode($msgtext);
	}
	$keyboard = array("inline_keyboard" => $layout,);
	$keyboard = json_encode($keyboard);
	return request("sendMessage?text=$msgtext&parse_mode=Markdown&chat_id=$id&reply_markup=$keyboard");
}

function editmsg($chatid, $msg, $inline, $edited){
        if(strpos($edited, "\n")){
		$edited = urlencode($edited);
	}
	return request("editMessageText?chat_id=$chatid&message_id=$msg&text=$urltext&parse_mode=Markdown&reply_markup=$inline");
}
		
