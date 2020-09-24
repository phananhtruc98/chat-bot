<?php
require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

header('Content-Type: application/json');

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
            'text' =>  $update['callback_query']['data'],
            'chat_id' => $update['callback_query']['message']['chat']['id']
        ]);
        file_get_contents($api . "/sendMessage?{$data}");
    } else {
        $chat_id = $update['message']['chat']['id']; // callbackquery chat id
        $message_text = $update['message']['text'];
    }

    // Check for normal command
    if ($message_text === "/random_word") {
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
        $word = $rand_word['name'] . ': ' . $rand_word['meaning'];
        $data = http_build_query([
            'text' => "Please choose your action: ",
            'chat_id' => $update['message']['chat']['id']
        ]);
        $keyboard = json_encode([
            "inline_keyboard" => [
                [
                    [
                        "text" => "All words",
                        "callback_data" => "Update later"
                    ],
                    [
                        "text" => "Give random word",
                        "callback_data" => $word
                    ]
                ]
            ]
        ]);
        // Send keyboard
        file_get_contents($api . "/sendMessage?{$data}&reply_markup={$keyboard}");
    }
}
?>
