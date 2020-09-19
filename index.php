<?php
 $token = "1263823155:AAF7VbdQ9jg04P-sIEKiyVnZ0Bd2QEqVGm4";
$user_id = "-409220601";

$request_params = [
    'chat_id' => $user_id,
    'text' => 'Bạn là ai dị?'
];
$request_params_getchat = [
    'chat_id' => $user_id,
    'text' => 'Bạn là ai dị?'
];
$request_url = 'https://api.telegram.org/bot' . $token;
header('Content-Type: application/json');

$getUpdates = $request_url . '/getUpdates';
echo json_encode(json_decode(file_get_contents($getUpdates)), JSON_PRETTY_PRINT);

$getChat = $request_url . '/getChat?' . http_build_query($request_params_getchat);
console.log('hello from Hien laptop')
echo json_encode(json_decode(file_get_contents($getChat)), JSON_PRETTY_PRINT);

//$newMessage =

?>
