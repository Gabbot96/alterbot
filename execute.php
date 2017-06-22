<?php

define('token','345269711:AAHhI6h6X6I9HnfBmdf94b2RcmYerRngFJ4');

include 'src.php';

if($text == "/start"){
	$button[] = array(array("text" => "🎓 Chi siamo", "callback_data" => "menu_1"), array("text" => "✉ Contattaci", "callback_data" => "menu_2"),);
	$button[] = array(array("text" => "🌎 Lingua", "callback_data" => "menu_3"), array("text" => "❤ Credits", "callback_data" => "menu_4"),);
	inlinekeyboard($button, $chatId, "Benvenuto in AlterBot \nIl bot di Alter.Polis per aiutare gli studenti \nCosa vuoi fare?");	
}










/*

if($text == "🎓 Chi siamo")
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

*/
