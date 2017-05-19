<?php

// start timer
$then = microtime(true);

// obtain configuration values from config.php
$config             = require('config.php');
$dev                = $config['dev'];
$alert_msg          = $config['alert'];
$logo               = $config['logo'];
$alert              = isset($alert_msg) && strlen($alert_msg) > 0;
$contact_enabled    = $config['contact']['enabled'];
$contact_email      = $config['contact']['email'];
$contact_phone      = $config['contact']['phone'];
$media_top          = $config['media']['top'];
$media_reviews      = $config['media']['reviews'];

// unique key to prevent caching
$key = $dev ? "?$then" : '';

// handle cookies and form submition
$submit = false;
$cookies = false;
$reset = false;

if (isset($_GET['reset'])) {
    setcookie('submitted', true, $then - 3600);
    $reset = true;
}

if ($contact_enabled && isset($_POST['name'])) {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $description = wordwrap($_POST['description'], 100, "\r\n");

    if (!isset($_COOKIE['submitted'])) {
        // compose mail
        $headers = 'MIME-Version: 1.0rn\r\nContent-type: text/html; charset=iso-8859-1rn\r\nFrom: $name';
        // options to send to cc+bcc
        // $headers .= "Cc: [email]email@test.com[/email]";
        // $headers .= "Bcc: [email]email@test.com[/email]";

        ob_start();

        $header = '$name\'s job request';
        echo "<h1>$header</h1>";

        ?>
        <hr>
        <b>Name:</b> <?php echo $name ?><br />
        <b>Phone:</b> <?php echo $phone?><br />
        <b>Email: <a style="color: #0099FF" href="mailto:<?php echo $email ?>"><?php echo $email ?></a></b><br />
        <b>Description:</b><br /> <?php echo $description ?>
        <hr>
        <b>Date of creation:</b> <?php echo date('l jS \of F Y \a\t h:i:s A') ?><br />
        <b>Applicant's IP:</b> <?php echo get_ip() ?>
        <?php

        mail($contact_email, $header, ob_get_clean(), $headers);

        setcookie('submitted', true, time() + 3600);
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
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

    <title>Painter For You!</title>
</head>
<body>

<?php
include_once("components/main.php");
?>

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