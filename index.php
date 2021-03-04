<?php

// PHP error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// start timer
$then = microtime(true);

// obtain configuration values from config.php
$config = require('config.php');
// include util file for handy function use
include('components/util.php');

define('DEV',                   $config['dev']);
define('ALERT_MSG',             $config['alert']);
define('LOGO',                  $config['logo']);
define('CONTACT_ENABLED',       $config['contact']['enabled']);
define('CONTACT_EMAIL',         $config['contact']['email']);
define('CONTACT_PHONE',         $config['contact']['phone']);
define('EMAILSERVER_URL',       $config['email_server']['url']);
define('EMAILSERVER_ID',        $config['email_server']['id']);
define('EMAILSERVER_KEY',       $config['email_server']['key']);
define('CAPTCHA_KEY_SITE',      $config['captcha']['site_key']);
define('CAPTCHA_KEY_SECRET',    $config['captcha']['secret_key']);
define('ANALYTICS_ID',          $config['analytics']['id']);
define('MEDIA_TOP',             $config['media']['top']);
define('MEDIA_REVIEWS',         $config['media']['reviews']);

// separate email and phone into 3 pieces of data for prevent bot spamming and data collection
$emailData1 = before("@", CONTACT_EMAIL);
$emailData2 = between("@", ".", CONTACT_EMAIL);
$emailData3 = after(".", CONTACT_EMAIL);

$phoneData = explode(" ", CONTACT_PHONE);
$phoneData1 = $phoneData[0];
$phoneData2 = $phoneData[1];
$phoneData3 = $phoneData[2];

$alert = ALERT_MSG !== null && strlen(ALERT_MSG) > 0;

// unique key to prevent caching
$key = DEV ? "?$then" : '';

// handle cookies and form submition
$submit = false;
$cookies = false;
$reset = false;
$error = false;
$captchaFail = false;

if (isset($_GET['reset'])) {
    setcookie('submitted', true, $then - 3600);
    $reset = true;
} else if (isset($_POST['token'])) {
    
    // call curl to POST request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => CAPTCHA_KEY_SECRET, 'response' => $_POST['token'])));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $arrResponse = json_decode($response, true);
    
    // verify the response
    if($arrResponse["success"] == '1' && $arrResponse["score"] >= 0.5) {
        // valid submission: compose mail if not spam
        if (CONTACT_ENABLED && !isset($_COOKIE['submitted'])) {        
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $description = wordwrap(str_replace('\n', '<br />', $_POST['description']), 120, '<br />');
            $header = "$name's job request";

            // body of email
            $body = "
            <h1>$header</h1>
            <hr>
            <b>Name:</b> $name<br />
            <b>Phone:</b> $phone<br />
            <b>Email: <a style='color: #0099FF' href='mailto:$email'>$email</a></b><br />
            <b>Description:</b><br />$description
            <hr>
            <b>ReCaptcha v3 Score:</b> " . $arrResponse["score"] . "<br />
            <b>Date of creation:</b> " . date('l jS \of F Y \a\t h:i:s A') . "<br />
            <b>Applicant's IP:</b> " . get_ip();

            $result = send_email($header, $body, $email, $name);
            $error = $result == false;

            // if an error ocurred, remove cookies to try again instead of enabling anti spam
            $time = $error ? $then - 3600 : time() + 3600;
            setcookie('submitted', true, $time);
        } else {
            $cookies = true;
        }
        
        $submit = true;
    } else {
        // spam submission: notify
        $error = true;
    }
}

function send_email($header, $body, $from, $from_name) {
    // organise data to prepare for JSON encoding
    $data = new stdClass();
    $data->ServerId = EMAILSERVER_ID;
    $data->ApiKey   = EMAILSERVER_KEY;
    $data->Messages = array(array(
                    'Subject'   => $header,
                    'To'        => array(array(
                            'EmailAddress' => CONTACT_EMAIL)),
                    'From'      => array(
                            'EmailAddress' => $from,
                            'FriendlyName' => $from_name),
                    'HtmlBody'  => $body
    )); 

    // use cURL to POST the JSON data to SocketLabs
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,               EMAILSERVER_URL);
    curl_setopt($ch, CURLOPT_POST,              true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,    true);
    curl_setopt($ch, CURLOPT_POSTFIELDS,        json_encode($data)); 
    curl_setopt($ch, CURLOPT_HTTPHEADER,        array('Content-Type: application/json')); 

    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="Paul's affordable and high quality painting and decorating services are offered here" />
    <meta name="keywords" content="galway, paint, painter, painting, decorator, decorating, cheap, affordable, high, quality, fast, efficient, gatis, pauls, paul, painterforyou">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Blueimp gallery CSS -->
    <link rel="stylesheet" href="css/blueimp-gallery.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css<?php echo $key ?>" />

    <title>Painter 4 You!</title>
</head>
<body>

<?php include_once("components/main.php"); ?>

</body>

<!-- jQuery -->
<script src="js/jquery-2.2.4.min.js"></script>

<!-- jQuery addons -->
<script src="js/blueimp-helper.js"></script>
<script src="js/blueimp-gallery.min.js"></script>
<script src="js/jquery.blueimp-gallery.min.js"></script>

<!-- Core JS files -->
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js<?php echo $key ?>"></script>

<!-- Google ReCaptcha v3 -->
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo CAPTCHA_KEY_SITE; ?>"></script>
<script>
    $('#contactModal').submit(function(event) {
        event.preventDefault();
          
        grecaptcha.ready(function() {
            grecaptcha.execute(<?php echo "\"".CAPTCHA_KEY_SITE."\""; ?>, {action: 'contact'}).then(function(token) {
                
                var recaptchaResponse = document.getElementById('token');
                recaptchaResponse.value = token;
                
                $('#contactModal').unbind('submit').submit();
            });;
        });
    });
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo ANALYTICS_ID; ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', <?php echo "\"".ANALYTICS_ID."\""; ?>);
</script>

</html>