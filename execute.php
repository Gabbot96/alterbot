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

header("Content-Type: application/json");
// rispondo con array JSON composto da chat_id, text, method
$parameters = array('chat_id' => $chatId, "text" => $text);
$parameters["method"] = "sendMessage";

// imposto la keyboard
$parameters["reply_markup"] = '{ "keyboard": [["uno"], ["due"], ["tre"], ["quattro"]], "one_time_keyboard": false}';
// converto e stampo l'array JSON sulla response
echo json_encode($parameters);
