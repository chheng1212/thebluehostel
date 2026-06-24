<?php
function sendTelegramNotification($message) {
    // ដាក់ Token ថ្មីរបស់អ្នកនៅទីនេះ
    $apiToken = "8885508114:AAHP7NTydAzYOE18VB6P7EGhzHf2ZjaZ3eU"; 
    $chatId = "812322058";
    
    $url = "https://api.telegram.org/bot{$apiToken}/sendMessage";
    $data = [
        'chat_id' => $chatId,
        'text' => $message,
        'parse_mode' => 'HTML'
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // បន្ទាត់នេះសំខាន់ណាស់សម្រាប់ Localhost
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
    
    $response = curl_exec($ch);
    
    // បង្ហាញ Error ប្រសិនបើមាន
    if(curl_errno($ch)) {
        echo 'cURL Error: ' . curl_error($ch);
    }
    
    curl_close($ch);
    return $response;
}

// តេស្តហៅ Functione




?>