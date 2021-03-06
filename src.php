<?php

define('api', 'https://api.telegram.org/bot'.token.'/');

$content = file_get_contents("php://input");
$update = json_decode($content, true);

//data fields del messaggio
$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";

//data fields delle query
$cbid = $update['callback_query']['from']['id'];
$cbdata = $update['callback_query']['data'];
$msgid = $update['callback_query']['message']['message_id'];
$ilmsgid = $update['callback_query']['inline_message_id'];
$queryid = $update['callback_query']['id'];

function callback($up){
	return $up["callback_query"]; 
}

//funzione che esegue la richiesta web tramite URL
function request($method){
        $req = file_get_contents(api.$method);
        return $req;     
}

//funzione per l'utilizzo del metodo sendMessage
function sendMess($id, $urltext){
        if(strpos($urltext, "\n")){
		$urltext = urlencode($urltext);
	}
	return request("sendMessage?text=$urltext&parse_mode=HTML&chat_id=$id");
}

//funzione per l'encoding di tastiere inline 
function inlinekeyboard($layout, $id, $msgtext){
        if(strpos($msgtext, "\n")){
		$msgtext = urlencode($msgtext);
	}
	$keyboard = array("inline_keyboard" => $layout,);
	$keyboard = json_encode($keyboard);
	return request("sendMessage?text=$msgtext&parse_mode=Markdown&chat_id=$id&reply_markup=$keyboard");
}

//funzione per l'update dei messaggi e l'update di tastiere inline 
function editmsg($chat_id, $msg, $inline, $edited){
        if(strpos($edited, "\n")){
		$edited = urlencode($edited);
	}
	$keyboard = array("inline_keyboard" => $inline,);
	$keyboard = json_encode($keyboard);
	return request("editMessageText?chat_id=$chat_id&message_id=$msg&text=$edited&parse_mode=Markdown&reply_markup=$keyboard");
}
		 
