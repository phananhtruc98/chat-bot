<?php
$token = "1263823155:AAF7VbdQ9jg04P-sIEKiyVnZ0Bd2QEqVGm4";
//$user_id = "1254653879";


$content = file_get_contents('php://input');
console.log('content',$content);
$update = json_decode($content, true);
console.log('update',$update);
/* if(!$update){
    exit;
}
$message = isset($update['message']) ? $update['message'] : null;
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : null;
$request_params = [
    'chat_id' => $chatId,
    'text' => $message
]; */
console.log('message',$message);
console.log('chatId',$chatId);
/* \header('Content-Type: application/json');

$request_url = 'https://api.telegram.org/bot' . $token . '/sendMessage?' . http_build_query($request_params);

file_get_contents($request_url) */

?>