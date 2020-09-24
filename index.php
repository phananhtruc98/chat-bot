<?php
require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

header('Content-Type: application/json');
$factory = (new Factory())
    ->withDatabaseUri('https://php-chat-bot-ed16a.firebaseio.com/');
$database = $factory->createDatabase();
$reference = $database->getReference('words')->getValue();
$json_encode = json_encode($reference, JSON_PRETTY_PRINT);
$array = json_decode($json_encode, true);
$first_value = reset($array);
//echo $first_value;
$rand_key = array_rand($array, 1);

$rand_word = $array[$rand_key];
//---------------------------------------------------------------
$token = "1263823155:AAF7VbdQ9jg04P-sIEKiyVnZ0Bd2QEqVGm4";
$user_id = "1254653879";
$api = 'https://api.telegram.org/bot' . $token;
$content = file_get_contents("php://input");
if ($content != null) {
    $update = json_decode($content, true); //callbackquery message id
    if (isset($update['callback_query'])) {
        // Reply with callback_query data
        $data = http_build_query([
            'text' => $msg = $update['callback_query']['data'],
            'chat_id' => $update['callback_query']['message']['chat']['id']
        ]);

        file_get_contents($api . "/sendMessage?{$data}");
    } else {
        $chat_id = $update['message']['chat']['id']; // callbackquery chat id
        $message_text = $update['message']['text'];
    }

    // Check for normal command
    if ($message_text === "/random_word") {
        $data = http_build_query([
            'text' => "Please choose your action: ",
            'chat_id' => $update['message']['chat']['id']
        ]);

        $keyboard = array(
            "inline_keyboard" => array(array(array("text" => "Remind random word", "callback_data" => $rand_word['name'] . ': ' . $rand_word['meaning'])))
        );
        // Send keyboard
        file_get_contents($api . "/sendMessage?{$data}&reply_markup={$keyboard}");
    }
}


?>
