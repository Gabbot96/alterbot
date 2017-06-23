<?php

define('token','345269711:AAHhI6h6X6I9HnfBmdf94b2RcmYerRngFJ4');

include 'src.php';

$words = "Benvenuto in AlterBot \nIl bot di Alter.Polis per aiutare gli studenti \nCosa vuoi fare?";

if($text == "/start"){
	$button[] = array(array("text" => "🎓 Chi siamo", "callback_data" => "menu_1"), array("text" => "✉ Rappresentanti", "callback_data" => "menu_2"),);
	$button[] = array(array("text" => "🌎 Lingua", "callback_data" => "menu_3"), array("text" => "❤ Credits", "callback_data" => "menu_4"),);
	inlinekeyboard($button, $chatId, $words);	
}

if(callback($update)){
	if($cbdata == "menu_0"){ //menu principale
		$button[] = array(array("text" => "🎓 Chi siamo", "callback_data" => "menu_1"), array("text" => "✉ Rappresentanti", "callback_data" => "menu_2"),);
		$button[] = array(array("text" => "🌎 Lingua", "callback_data" => "menu_3"), array("text" => "❤ Credits", "callback_data" => "menu_4"),);
		editmsg($cbid, $msgid, $button, $words);		
	}
	elseif($cbdata == "menu_1"){ //Chi siamo
		$button[] = array(array("text" => "Alter.Polis", "url" => "alterpolis.it/it/homepage/"), array("text" => "LINK", "url" => "linkcoordinamentouniversitario.it/"),);
		$button[] = array(array("text" => "Indietro", "callback_data" => "menu_0"),);
		editmsg($cbid, $msgid, $button, "questo è il menu 1"); //inserire descrizione del collettivo e di LINK

	}
	elseif($cbdata == "menu_2"){ // Rappresentanti
		$button[] = array(array("text" => "Organi Centrali", "callback_data" => "menu_2a"), array("text" => "Organi Periferici", "callback_data" => "menu_2b"),);
		$button[] = array(array("text" => "Indietro", "callback_data" => "menu_0"),);
		editmsg($cbid, $msgid, $button, "questo è il menu 2");	//due parole sui nostri numeri negli organi	
	}
	elseif($cbdata == "menu_3"){ //Lingua
		$button[] = array(array("text" => "🇮🇹 Italiano", "callback_data" => "it"), array("text" => "🇬🇧 English", "callback_data" => "en"),);
		$button[] = array(array("text" => "🇫🇷 Français", "callback_data" => "fr"), array("text" => "🇨🇳 中文", "callback_data" => "cc"),);
		$button[] = array(array("text" => "Indietro", "callback_data" => "menu_0"),);
		editmsg($cbid, $msgid, $button, "⚠ WORK IN PROGRESS ⚠\n\nQuesta feature sarà presto disponibile\nThis feature will be available soon");  
		
	}
	elseif($cbdata == "menu_4"){ //Credits
		$text_4 = "*Bot sviluppato da:*\nGabriele Tavella\n\n*Con l'aiuto di:*\nDavid Chiappini\nMarco Rondina";
		$button[] = array(array("text" => "Indietro", "callback_data" => "menu_0"),);
		editmsg($cbid, $msgid, $button, $text_4);
		
	}
	elseif($cbdata == "menu_2a"){ // Organi Centrali
		$button[] = array(array("text" => "Indietro", "callback_data" => "menu_2"),);
		editmsg($cbid, $msgid, $button, "questo è il menu 2a");		
	}
	elseif($cbdata == "menu_2b"){ // Organi Periferici
		$button[] = array(array("text" => "Indietro", "callback_data" => "menu_2"),);
		editmsg($cbid, $msgid, $button, "questo è il menu 2b");	//implementare qua la ricerca	
	}
}


