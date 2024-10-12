<?php
session_start();

function verifyOtp($otp) {
    $apiKey = 'YOUR_FIREBASE_API_KEY'; // Apni Firebase API Key yahan daalein.
    
    // URL for verifying OTP
    $url = 'https://identitytoolkit.googleapis.com/v1/accounts:signInWithPhoneNumber?key=' . $apiKey;

    // Prepare the data for verifying OTP
    $data = [
        'phoneNumber' => $_SESSION['verificationId'],
        'code' => $otp,
    ];

    // Initialize cURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
    ]);

    // Execute the request
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

// Use this function to verify OTP
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $otp = $_POST['otp'];
    $response = verifyOtp($otp);

    if (isset($response['error'])) {
        echo 'Error: ' . $response['error']['message'];
    } else {
        echo 'OTP verified successfully! User ID: ' . $response['localId'];
    }
}
?>