<?php
$token = "1263823155:AAF7VbdQ9jg04P-sIEKiyVnZ0Bd2QEqVGm4";
$user_id = "1254653879";
$api = 'https://api.telegram.org/bot' . $token;

// $update = json_decode(file_get_contents('php://input'), true);

// $a = $update['message']['text'];

// $request_params = [
//     'chat_id' => $user_id,
//     'text' => 'hellos'
// ];
// $request_url = 'https://api.telegram.org/bot/' . $token . '/sendMessage?' . http_build_query($request_params);

// file_get_contents($request_url);
// ________________________________________________________________
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
    } 
    else{
        $chat_id = $update['message']['chat']['id']; // callbackquery chat id
        $message_text = $update['message']['text'];
    }
    
    // Check for normal command
    if ($message_text === "/new_word") {

        // Create keyboard
        $data = http_build_query([
            'text' => 'Please choose your action:',
            'chat_id' => $update['message']['chat']['id']
        ]);
        $keyboard = json_encode([
            "inline_keyboard" => [
                [
                    [
                        "text" => "Add New Word",
                        "callback_data" => "Ok friend"
                    ],
                    [
                        "text" => "Remind random word",
                        "callback_data" => "Good job my friend"
                    ]
                ]
            ]
        ]);

        // Send keyboard
        file_get_contents($api . "/sendMessage?{$data}&reply_markup={$keyboard}");


        // $request_params = [
        //     'chat_id' => $chat_id,
        //     'text' => $message_text
        // ];

        // $request_url = 'https://api.telegram.org/bot' . $token . '/sendMessage?' . http_build_query($request_params);
        // file_get_contents($request_url);
    }
}
echo 'a';
