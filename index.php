<?php

// PHP error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// start timer
$then = microtime(true);

// obtain configuration values from config.php
$config = require('config.php');

define('DEV',               $config['dev']);
define('ALERT_MSG',         $config['alert']);
define('LOGO',              $config['logo']);
define('CONTACT_ENABLED',   $config['contact']['enabled']);
define('CONTACT_EMAIL',     $config['contact']['email']);
define('CONTACT_PHONE',     $config['contact']['phone']);
define('EMAILSERVER_URL',   $config['email_server']['url']);
define('EMAILSERVER_ID',    $config['email_server']['id']);
define('EMAILSERVER_KEY',   $config['email_server']['key']);
define('MEDIA_TOP',         $config['media']['top']);
define('MEDIA_REVIEWS',     $config['media']['reviews']);

$alert = ALERT_MSG !== null && strlen(ALERT_MSG) > 0;

// unique key to prevent caching
$key = DEV ? "?$then" : '';

// handle cookies and form submition
$submit = false;
$cookies = false;
$reset = false;
$error = false;

if (isset($_GET['reset'])) {
    setcookie('submitted', true, $then - 3600);
    $reset = true;
} else if (isset($_POST['name'])) {

    // compose mail if not spam
    if (CONTACT_ENABLED && !isset($_COOKIE['submitted'])) {        
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $description = wordwrap(str_replace('\n', '<br />', $_POST['description']), 100, '<br />');
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
}

function get_ip() {
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else
        $ip = $_SERVER['REMOTE_ADDR'];
    return $ip;
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

<!-- Google Analytics -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-93481158-1', 'auto');
    ga('send', 'pageview');
</script>

</html>