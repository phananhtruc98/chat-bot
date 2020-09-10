<?php
$token = "1263823155:AAF7VbdQ9jg04P-sIEKiyVnZ0Bd2QEqVGm4";
$user_id = "1254653879";

$request_params = [
    'chat_id' => $user_id,
    'text' => 'Bạn là ai dị?'
];
//$request_url = 'https://api.telegram.org/bot' . $token . '/sendMessage?' . http_build_query($request_params);
$request_url = 'https://api.telegram.org/bot' . $token . '/getUpdates';
$result = file_get_contents($request_url);
debug_to_console($result);

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
?>