<?php
//$user_id = "1254653879";
$_POST = file_get_contents('php://input');;
$update = file_get_contents('php://input');
echo isset($update['callback_query']);

echo $_POST;
echo $update;
/* function isValidJSON($str)
{
    json_decode($str);
    return json_last_error() == JSON_ERROR_NONE;
}

$json_params = file_get_contents("php://input");

if (strlen($json_params) > 0 && isValidJSON($json_params))
    $decoded_params = json_decode($json_params);
    debug_to_console($decoded_params); */


/* $botToken = "1263823155:AAF7VbdQ9jg04P-sIEKiyVnZ0Bd2QEqVGm4";
    $botAPI = "https://api.telegram.org/bot" . $botToken;

    // Check if callback is set
    if (isset($update['callback_query'])) {

        // Reply with callback_query data
        $data = http_build_query([
            'text' => $msg = $update['message']['text'],
            'chat_id' => $update['callback_query']['from']['id']
        ]);
        
        file_get_contents($botAPI . "/sendMessage?{$data}");
    } */
function debug_to_console($data)
{
    $output = $data;

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
/* 
    // Check for normal command
    $msg = $update['message']['text'];
    if ($msg === "/new_word") {

        // Create keyboard
        $data = http_build_query([
            'text' => 'Please select language;',
            'chat_id' => $update['message']['from']['id']
        ]);
        $keyboard = json_encode([
            "inline_keyboard" => [
                [
                    [
                        "text" => "english",
                        "callback_data" => "english"
                    ],
                    [
                        "text" => "russian",
                        "callback_data" => "russian"
                    ]
                ]
            ]
        ]);

        // Send keyboard
        file_get_contents($botAPI . "/sendMessage?{$data}&reply_markup={$keyboard}"); */
