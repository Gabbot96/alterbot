<?php

define('token','345269711:AAHhI6h6X6I9HnfBmdf94b2RcmYerRngFJ4');

include 'src.php';

if($text == "/start"){
	$words = "Benvenuto in AlterBot \nIl bot di Alter.Polis per aiutare gli studenti \nCosa vuoi fare?";
	$button[] = array(array("text" => "🎓 Chi siamo", "callback_data" => "menu_1"), array("text" => "✉ Contattaci", "callback_data" => "menu_2"),);
	$button[] = array(array("text" => "🌎 Lingua", "callback_data" => "menu_3"), array("text" => "❤ Credits", "callback_data" => "menu_4"),);
	inlinekeyboard($button, $chatId, $words);	
}

if(callback($update)){
	if($cbdata == "menu_0"){ //menu principale
		$button[] = array(array("text" => "Alter.Polis", "callback_data" => "menu_1"), array("text" => "LINK", "callback_data" => "menu_2"),);
		$button[] = array(array("text" => "Indietro", "callback_data" => "menu_0"),);
		editmsg($chatId, $msgid, $button, $words);		
	}
	elseif($cbdata == "menu_1"){
		echo "##########\t"&$chatId&" && "&$cbid&"/t##########"
		//$button[] = array(array("text" => "Alter.Polis", "callback_data" => "menu_1"), array("text" => "LINK", "callback_data" => "menu_2"),);
		//$button[] = array(array("text" => "Indietro", "callback_data" => "menu_0"),);
		//editmsg($chatId, $msgid, $button, "lorem ipsum");
		sendMess($cbid, "ritenta");
	}
	elseif($cbdata == "menu_2"){
		$button[] = array(array("text" => "Organi Centrali", "callback_data" => "menu_2a"), array("text" => "Organi Periferici", "callback_data" => "menu_2b"),);
		$button[] = array(array("text" => "Indietro", "callback_data" => "menu_0"),);
		inlinekeyboard($button, $chatId, "");		
	}
	elseif($cbdata == "menu_3"){
		$button[] = array(array("text" => "Italiano", "callback_data" => "it"), array("text" => "English", "callback_data" => "en"),);
		$button[] = array(array("text" => "Italiano", "callback_data" => "fr"), array("text" => "中文", "callback_data" => "cc"),);
		$button[] = array(array("text" => "Indietro", "callback_data" => "menu_0"),);
		inlinekeyboard($button, $chatId, "");		
	}
	elseif($cbdata == "menu_4"){
		$button[] = array(array("text" => "Alter.Polis", "callback_data" => "menu_1"), array("text" => "LINK", "callback_data" => "menu_2"),);
		$button[] = array(array("text" => "Indietro", "callback_data" => "menu_0"),);
		inlinekeyboard($button, $chatId, "");		
	}
}


