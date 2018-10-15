<?php
function sendMessage($chat_id, $text, $replyKeyboardMarkup){
	$url= "https://api.telegram.org/bot659318246:AAH00YNQr8nZ3Pd_R0853iuMVCp325abzws/";
	
	$chat_id = "chat_id=".$chat_id;
	$text = "&text=".urlencode($text);
	if ($replyKeyboardMarkup !== null){
		
		if ($replyKeyboardMarkup == ""){
			$replyKeyboardMarkup = "&reply_markup=";
		} else{
			$replyKeyboardMarkup = "&reply_markup=".json_encode($replyKeyboardMarkup);
		}
	} else{
		$replyKeyboardMarkup = "&reply_markup=".json_encode(array("remove_keyboard" => true));
	}
	
	file_put_contents("Texts/CompletedUrl.txt", $url."sendMessage?".$chat_id.$text.$replyKeyboardMarkup);
	$telegram_response = file_get_contents($url."sendMessage?".$chat_id.$text.$replyKeyboardMarkup);
	file_put_contents("Texts/TelegramResponse.txt", $telegram_response);
}

?>