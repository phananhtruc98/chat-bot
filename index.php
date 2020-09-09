<?php
$token = "1263823155:AAF7VbdQ9jg04P-sIEKiyVnZ0Bd2QEqVGm4";
$user_id = "1254653879";

$request_params = [
    'chat_id' => $user_id,
    'text' => 'Bạn là ai dị?'
];
$request_url = 'https://api.telegram.org/bot' . $token . '/sendMessage?' . http_build_query($request_params);

file_get_contents($request_url)
?>