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
//$text = strtolower($text); creates problems while gathering text from custom keyboard in if cycle

$parameters['chat_id'] = $chatId;
$parameters["reply_markup"] = "";
$response = "";



if(strpos($text, "/start") == "/start")
{
	// imposto la keyboard
	$parameters["reply_markup"] = '{ "keyboard": [["1. Chi siamo"], ["2. Contattaci"]], [[":earth_americas: Lingua"], ["4. Credits"]]], "one_time_keyboard": false}';
	$response = "Benvenuto in AlterBot \nIl bot di Alter.Polis per aiutare gli studenti \nCosa vuoi fare?";
}
elseif($text == "1. Chi siamo")
{
	$parameters["reply_markup"] = '{ "keyboard": [["Alter.Polis"], ["LINK"], ["Indietro"]], "one_time_keyboard": false, "resize_keyboard": true}';
	$response = "";
}
elseif($text == "2. Rappresentanti")
{
	$parameters["reply_markup"] = '{ "keyboard": [["Organi Centrali"], ["Organi Periferici"], ["Indietro"]], "one_time_keyboard": true, "resize_keyboard": true}';
}
elseif($text == ":earth_americas: Lingua")
{
	$parameters["reply_markup"] = '{ "keyboard": [["Italiano"], ["English"], ["Français"], ["中文"] ["Indietro"]], "one_time_keyboard": true, "resize_keyboard": true}';
	$response = "Feature in allestimento";
}
elseif($text == "4. Credits")
{
	$response = "";
}
else
{
	$response = $text;  //debug only
}

header("Content-Type: application/json");
// rispondo con array JSON composto da chat_id, text, method
$parameters['chat_id'] = $chatId;

$parameters["text"] = $response;
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
