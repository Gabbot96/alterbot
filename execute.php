<?php

define('token','345269711:AAHhI6h6X6I9HnfBmdf94b2RcmYerRngFJ4');

require_once 'src.php';















if(strpos($text, "/start") == "/start")
{
	// imposto la keyboard
	$parameters["reply_markup"] = '{ "keyboard": [["🎓 Chi siamo"], ["✉ Contattaci"], ["🌎 Lingua"], ["❤ Credits"]], "one_time_keyboard": false}';
	$response = "Benvenuto in AlterBot \nIl bot di Alter.Polis per aiutare gli studenti \nCosa vuoi fare?";
}
elseif($text == "🎓 Chi siamo")
{
	$parameters["reply_markup"] = '{ "keyboard": [["Alter.Polis"], ["LINK"], ["Indietro"]], "one_time_keyboard": false, "resize_keyboard": true}';
}
elseif($text == "✉ Contattaci")
{
	$parameters["reply_markup"] = '{ "keyboard": [["Organi Centrali"], ["Organi Periferici"], ["Indietro"]], "one_time_keyboard": true, "resize_keyboard": true}';
}
elseif($text == "🌎 Lingua")
{
	$parameters["reply_markup"] = '{ "keyboard": [["Italiano"], ["English"], ["Français"], ["中文"] ["Indietro"]], "one_time_keyboard": true, "resize_keyboard": true}';
	$response = "Feature in allestimento";
}
elseif($text == "❤ Credits")
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
