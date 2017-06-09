<?php
// recupero il contenuto inviato da Telegram
$content = file_get_contents("php://input");
// converto il contenuto da JSON ad array PHP
$update = json_decode($content, true);
// se la richiesta è null interrompo lo script
if(!$update)
{
  exit;
}
// assegno alle seguenti variabili il contenuto ricevuto da Telegram
$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$text = trim($text);
$text = strtolower($text);



if(strpos($text, "/start") == "/start")
{
	// imposto la keyboard
	$parameters["reply_markup"] = '{ "keyboard": [["uno"], ["due"], ["tre"], ["quattro"]], "one_time_keyboard": false}';
}
elseif($text=="uno")
{
	$response = "risposta 1";
}
elseif($text=="due")
{
	$response = "risposta 2";
}
else
{
	$response = "Comando non valido!";
}

header("Content-Type: application/json");
// rispondo con array JSON composto da chat_id, text, method
$parameters['chat_id'] = $chatId;

$parameters["text"] = $response;
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
