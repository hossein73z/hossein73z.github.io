<?php
function setReplyKeyboardMarkup ($keyboard, $resize_keyboard, $one_time_keyboard, $selective){
	
	$replyKeyboardMarkup = null;
	if ($keyboard !== null){
			$replyKeyboardMarkup['keyboard'] = $keyboard;
			if ($resize_keyboard !== null) $replyKeyboardMarkup['resize_keyboard'] = $resize_keyboard;
			if ($one_time_keyboard !== null) $replyKeyboardMarkup['one_time_keyboard'] = $one_time_keyboard;
			if ($selective !== null) $replyKeyboardMarkup['selective'] = $selective;
	}
	
	file_put_contents("Texts/replyKeyboardMarkup.txt", json_encode($replyKeyboardMarkup));
	return $replyKeyboardMarkup;
}
?>