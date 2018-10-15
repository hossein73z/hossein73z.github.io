<?PHP
include ("DatabaseCRUD.php");
include ("Functions/SendMessage.php");
include ("Functions/AnswerCallbackQuery.php");
include ("Functions/EditMessageText.php");
include ("Functions/ReplyKeyboardMarkup.php");
header ('Content-Type: text/plain; charset=utf-8');
$jsonReceive = file_get_contents("php://input");

$update = json_decode($jsonReceive, true);
$message = $update['message'];
$callback_query = $update['callback_query'];

file_put_contents("Texts/Received Update.txt", "Received Json:\n" . $jsonReceive);

if (!empty($message)) {
    //Set Or SignUp User
    $from = $message['from'];
    $user_array = read_user($from['id'], "id");

    if (!$user_array) {
        add_user($from, false, 0);
        $user = $from;
        sendMessage($user['id'], "Hi! Welcome Home ".$user['first_name']."✋😊", null);
    } else {
        $user = $user_array[0];
        file_put_contents("Texts/Received Update.txt", "Received Json:\n" . $jsonReceive . "\n\n" . "Received Message Text:\n" . json_encode($message['text']) . "\n\n" . "Received From:\n" . $from['username']);
        $message_text = $message['text'];
        $message_date = $message['date'];



        switch ($message_text) {
            case "/delete":
                $user_deleted = delete_user($user['id']);
                if ($user_deleted) {
                    sendMessage($user['id'], "HURRY!! Your data is deleted successfully 😃👌", null);
                } else {
                    sendMessage($user['id'], "SORRY!! There was a problem on removing your data from our database 😔", null);
                }
                break;

            default:
                sendMessage($user['id'], $message['text'], null);
                break;
        }
    }

}elseif (!empty($callback_query)) {
    //Set Or SignUp User
    $from = $callback_query['from'];
    $user_array = read_user($from['id'], "id");
    if (!$user_array) {
        add_user($from, false, 0);
        $user = $from;
        sendMessage($user['id'], "Hi! Welcome Home ".$user['first_name']."✋😊", null);
    } else {
        $user = $user_array[0];
        sendMessage($user['id'], $user['username'], null);
    }
    file_put_contents("Texts/Received Update.txt", "Received Json:\n" . $jsonReceive . "\n\n" . "Received Callback Query:\n" . json_encode($callback_query) . "\n\n" . "Received From:\n" . $from['username']);

}

?>
