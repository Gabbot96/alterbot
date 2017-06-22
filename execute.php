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
$text = trim($text, $trimchar);


$parameters['chat_id'] = $chatId;
$parameters["reply_markup"] = "";
$response = "";


if(strpos($text, "/start") == "/start")
{
	// imposto la keyboard
	$parameters["reply_markup"] = '{ "inline_keyboard": [["Chi siamo"], ["Contattaci"], ["Lingua"], ["Credits"]]}';
	$response = "Benvenuto in AlterBot \nIl bot di Alter.Polis per aiutare gli studenti \nCosa vuoi fare?";
}
elseif($text == "Chi siamo")
{
	$parameters["reply_markup"] = '{ "inline_keyboard": [["Alter.Polis"], ["LINK"], ["Indietro"]]}';
}
elseif($text == "Contattaci")
{
	$parameters["reply_markup"] = '{ "inline_keyboard": [["Organi Centrali"], ["Organi Periferici"], ["Indietro"]]}';
}
elseif($text == "Lingua")
{
	$parameters["reply_markup"] = '{ "inline_keyboard": [["Italiano"], ["English"], ["Français"], ["中文"] ["Indietro"]]}';
	$response = "Feature in allestimento";
}
elseif($text == "Credits")
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
