<?php

// start timer
$then = microtime(true);

// obtain configuration values from config.php
$config             = require("config.php");
$dev                = $config["dev"];
$alert_msg          = $config["alert"];
$logo               = $config["logo"];
$alert              = isset($alertmsg) && strlen($alertmsg) > 0;
$contact_enabled    = $config["contact"]["enabled"];
$contact_email      = $config["contact"]["email"];
$contact_phone      = $config["contact"]["phone"];
$media_top          = $config["media"]["top"];

// unique key to prevent caching
$key = $dev ? "?$then" : "";

// handle cookies and form submition
$submit = false;
$cookies = false;
$reset = false;

if (isset($_GET["reset"])) {
    setcookie("submitted", true, $then - 3600);
    $reset = true;
}

if ($contact_enabled && isset($_POST["name"])) {

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $description = wordwrap($_POST["description"], 100, "\r\n");

    if (!isset($_COOKIE["submitted"])) {
        // compose mail
        $headers = "MIME-Version: 1.0rn\r\nContent-type: text/html; charset=iso-8859-1rn\r\nFrom: $name";
        // options to send to cc+bcc
        // $headers .= "Cc: [email]email@test.com[/email]";
        // $headers .= "Bcc: [email]email@test.com[/email]";

        ob_start();

        $header = "$name's job request";
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

        setcookie("submitted", true, time() + 3600);
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

        <div class="container-fluid">

            <div class="header">
                <div class="container">
                    <div class="row">

                        <!-- left -->
                        <div class="col-sm-8">
                            <a href="//painter4you.com">
                                <img height=100px src="img/<?php echo $config['logo'] ?>" />
                            </a>
                        </div>
                        <!-- /left -->

                        <!-- right -->
                        <div class="box col-sm-3" style="margin-top: 15px">
                            <dl class="dl-horizontal" style="margin: 5px 0 0 -100px">
                                <dt>Phone</dt>
                                <?php echo "<dd>$contact_phone</dd>" ?>
                                <dt>Email</dt>
                                <?php echo "<dd><a href='mailto:$contact_email'>$contact_email</a></dd>" ?>
                            </dl>
                        </div>
                        <!-- /right -->
                    </div>
                </div>
            </div>

            <!-- alert -->
            <?php require("components/alert.php") ?>

            <!-- carousel -->
            <?php require("components/gallery1.php") ?>

            <!-- main -->
            <div class="container">
                <div class="row">

                    <!-- left -->
                    <div class="col-sm-2" id="leftCol">
                        <ul class="box nav nav-stacked" id="sidebar">
                            <li><a href="#services"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Services</a></li>
                            <li><a href="#gallery"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Recent Work</a></li>
                            <li><a href="#reviews"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Reviews</a></li>
                            <li><a href="#contact"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Contact</a></li>
                        </ul>
                    </div>
                    <!-- /left -->

                    <!-- right -->
                    <div class="vertical col-sm-10" id="rightCol">

                        <!-- about -->
                        <div class="section" id="services">
                            <h1><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Services <small>What I can do for you</small></h1>
                        </div>

                        <hr class="separator" />

                        <?php require("components/services.php") ?>
                        <!-- /about -->
						
                        <!-- gallery -->
                        <div class="section" id="gallery">
                            <h1><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Gallery <small>Some of my previous work</small></h1>
                        </div>

                        <hr class="separator" />

                        <?php require("components/gallery2.php") ?>
                        <!-- /gallery -->

                        <!-- reviews -->
                        <div class="section" id="reviews">
                            <h1><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Reviews <small>Read what other customers think</small></h1>
                        </div>

                        <hr class="separator" />

                        <!-- WIP -->
                        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                        <!-- /reviews -->

                        <!-- contact -->
                        <div class="section" id="contact">
                            <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Contact Me <small>For any quotes, questions or information</small></h1>
                        </div>

                        <hr class="separator" />

                        <div class="row">
                            <div class="col-md-7">
                                <!-- WIP -->
                            </div>
                            <div class="col-md-5 text-center">
                                <div class="box">
                                    <div class="box-content">
                                        <h1 class="tag-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Contact</h1>
                                        <hr class="separator" />
                                        <div class="row">
                                            <div class="col-md-4" style="text-align: right">
                                                <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> <b>Phone</b><br />
                                                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <b>Email</b>
                                            </div>
                                            <div class="col-md-5" style="text-align: left">
                                                <?php echo $contact_phone ?><br />
                                                <b><a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a></b>
                                            </div>
                                        </div>
                                        <hr class="separator" />

                                        <!-- button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#contactModal">Contact Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /contact -->
                    </div>
                    <!-- /right -->

                </div>

                <!-- footer -->
                <hr class="separator" />
                <div class="row">
                    <div class="col-lg-8">
                        <?php echo "<p>© Copyright - Painter4You.ie Ireland | PHONE: $contact_phone | EMAIL: <b><a href='mailto:$contact_email'>$contact_email</a></b></p>" ?>
                    </div>

                    <?php
                    // output the time taken to load the page if debugging is enabled
                    if ($dev) {
                        $now = microtime(true);
                        $load = round(($now - $then) * 1000);
                        echo "<div class='col-xs-4'>";
                        echo    "<small class='pull-right'>";
                        echo        "<em>Page loaded in $load ms</em>";
                        echo    "</small>";
                        echo "</div>";
                    }
                    ?>

                </div>
                <!-- /footer -->
            </div>
            <!-- /main -->
        </div>

        <?php
        require("components/contactModal.php");
        ?>

        <a href="#top" class="cd-top">Top</a>

    </body>

    <script src="js/jquery-2.2.4.min.js"></script>

    <script src="js/blueimp-helper.js"></script>
    <script src="js/blueimp-gallery.min.js"></script>
    <script src="js/jquery.blueimp-gallery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</html>