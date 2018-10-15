<?php
function answerCallbackQuery($callback_query_id, $text, $show_alert){
	$url= "https://api.telegram.org/bot496636571:AAGdgNn8ZpbGJiNLfJgT6J1oJd17J7yYVOM/";
	
	$callback_query_id = "callback_query_id=".$callback_query_id;
	if($text != "" || $text != null){$text = "&text=".urlencode($text);}
	if($show_alert != "" || $show_alert != null){$show_alert = "&show_alert=true";}
	
	file_put_contents("Texts/AnswerCallbackQuery.txt", $url."answerCallbackQuery?".$callback_query_id.$text.$show_alert);
	$telegram_response = file_get_contents($url."answerCallbackQuery?".$callback_query_id.$text.$show_alert);
	file_put_contents("Texts/TelegramResponse.txt", $telegram_response);
}

?>