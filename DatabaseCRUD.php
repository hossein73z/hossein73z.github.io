<?PHP

//KeyboardButton Functions
function delete_keyboardButton ($id){
	$dbHost = "localhost";
	$dbUser = "id7471458_dementor73";
	$dbPass = "h457869z";
	$dbName = "id7471458_sbrhomebot";
	$link = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
	$query = mysqli_query($link, "DELETE FROM `buttons` WHERE `buttons`.`id` = '$id' ");
	
	if(mysqli_affected_rows($link) > 0) {
		return true;
	}else {
		return false;
	}
}
function read_keyboardButton ($id){
	$dbHost = "localhost";
	$dbUser = "id7471458_dementor73";
	$dbPass = "h457869z";
	$dbName = "id7471458_sbrhomebot";
	$link = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
	$query = mysqli_query($link, "SELECT * FROM `buttons` WHERE `buttons`.`id` = '$id' ");

	$keyboardButton_array = null;
	
	while ($fetch_result = mysqli_fetch_array($query)){
		$keyboardButton['id'] = $fetch_result['id'];
		$keyboardButton['user_state'] = $fetch_result['user_state'];
		$keyboardButton['message'] = $fetch_result['message'];		
		$keyboardButton['text'] = $fetch_result['text'];
		
		$keyboardButton_array[] = $keyboardButton;
	}
	
	if (empty($keyboardButton_array)){
		return false;
	} else{
		return $keyboardButton_array;
	}
}
function read_keyboardButtonByUser_state ($user_state){
	$dbHost = "localhost";
	$dbUser = "id7471458_dementor73";
	$dbPass = "h457869z";
	$dbName = "id7471458_sbrhomebot";
	$link = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
	$query = mysqli_query($link, "SELECT * FROM `buttons` WHERE `buttons`.`user_state` = '$user_state' ");
	
	$keyboardButton_array = null;
	while ($fetch_result = mysqli_fetch_array($query)){
		
		$keyboardButton = null;
		$keyboardButton['id'] = $fetch_result['id'];
		$keyboardButton['text'] = $fetch_result['text'];		
		
		$keyboardButton_array[] = $keyboardButton;
	}
		
	if (empty($keyboardButton_array)){
		return false;
	} else{
		return $keyboardButton_array;
	}
}

//User Functions
function delete_user ($id){
	$dbHost = "localhost";
	$dbUser = "id7471458_dementor73";
	$dbPass = "h457869z";
	$dbName = "id7471458_sbrhomebot";
	$link = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
	$query = mysqli_query($link, "DELETE FROM `users` WHERE `users`.`id` = '$id' ");
	
	if(mysqli_affected_rows($link) > 0) {
		return true;
	}else {
		return false;
	}
}
function add_user ($user, $is_admin, $in_bot_state){
	$dbHost = "localhost";
	$dbUser = "id7471458_dementor73";
	$dbPass = "h457869z";
	$dbName = "id7471458_sbrhomebot";
	$link = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

    $id = $user['id'];
    $first_name = $user['first_name'];
    $last_name = $user['last_name'];
    $username = $user['username'];

	$query = mysqli_query($link, "INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `is_admin`, `in_bot_state`) VALUES ('$id', '$first_name', '$last_name', '$username', '$is_admin', '$in_bot_state')");

	if(mysqli_affected_rows($link) > 0) {
		return true;
	}else {
		return false;
	}
}
function read_user ($arg, $column){
	$dbHost = "localhost";
	$dbUser = "id7471458_dementor73";
	$dbPass = "h457869z";
	$dbName = "id7471458_sbrhomebot";
	$link = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
	$query = mysqli_query($link, "SELECT * FROM `users` WHERE `users`.`$column` = '$arg' ");
	
	while ($fetch_result = mysqli_fetch_array($query)){
		$user['id'] = ($fetch_result['id']);
		$user['first_name'] = ($fetch_result['first_name']);
		$user['last_name'] = ($fetch_result['last_name']);
		$user['username'] = ($fetch_result['username']);
		$user['is_admin'] = ($fetch_result['is_admin']);
		$user['in_bot_state'] = ($fetch_result['in_bot_state']);
		
		$user_array[] = $user;
	}
	
	if (empty($user_array)){
		return false;
	} else{
		return $user_array;
	}		
}
function update_user ($id, $first_name, $last_name, $username, $is_admin, $in_bot_state){
	$user_array = read_user($id, "id");
	$user = $user_array[0];
	
	if ($first_name === null) $first_name = $user['first_name'];
	if ($last_name === null) $last_name = $user['last_name'];
	if ($username === null) $username = $user['username'];
	if ($is_admin === null) $is_admin = $user['is_admin'];
	if ($in_bot_state === null) $in_bot_state = $user['in_bot_state'];

	$dbHost = "localhost";
	$dbUser = "id7471458_dementor73";
	$dbPass = "h457869z";
	$dbName = "id7471458_sbrhomebot";
	$link = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
	$query = mysqli_query($link, "UPDATE `users` SET `first_name` = '$first_name', `last_name` = '$last_name', `username` = '$username', `is_admin` = '$is_admin', `in_bot_state` = '$in_bot_state' WHERE `users`.`id` = '$id'");
	
	return $query;
}

?>
