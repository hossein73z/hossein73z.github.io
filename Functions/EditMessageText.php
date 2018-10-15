<?php
function editMessageText($chat_id, $message_id, $text, $replyKeyboardMarkup){
	$url= "https://api.telegram.org/bot496636571:AAGdgNn8ZpbGJiNLfJgT6J1oJd17J7yYVOM/";
	
	$chat_id = "chat_id=".$chat_id;
	$message_id = "&message_id=".$message_id;
	$text = "&text=".urlencode($text);
	if ($replyKeyboardMarkup !== null){
		
		if ($replyKeyboardMarkup == ""){
			$replyKeyboardMarkup = "&reply_markup=";
		} else{
			$replyKeyboardMarkup = "&reply_markup=".json_encode($replyKeyboardMarkup);
		}
	} else{
		$replyKeyboardMarkup = "";
	}
	
	file_put_contents("Texts/EditMessageTextURL.txt", $url."editMessageText?".$chat_id.$message_id.$text.$replyKeyboardMarkup);
	$telegram_response = file_get_contents($url."editMessageText?".$chat_id.$message_id.$text.$replyKeyboardMarkup);
	file_put_contents("Texts/TelegramResponse.txt", $telegram_response);
}

?>