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
    <?php include_once("components/alert.php") ?>

    <!-- carousel -->
    <?php include_once("components/gallery1.php") ?>

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

                <?php include_once("components/services.php") ?>
                <!-- /about -->

                <!-- gallery -->
                <div class="section" id="gallery">
                    <h1><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Gallery <small>Some of my previous work</small></h1>
                </div>

                <hr class="separator" />

                <?php include_once("components/gallery2.php") ?>
                <!-- /gallery -->

                <!-- reviews -->
                <div class="section" id="reviews">
                    <h1><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Reviews <small>Read what other customers think</small></h1>
                </div>

                <hr class="separator" />

                <?php include_once("components/testimonials.php") ?>
                <!-- /reviews -->

                <!-- contact -->
                <div class="section" id="contact">
                    <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Contact Me <small>For any quotes, questions or information</small></h1>
                </div>

                <hr class="separator" />

                <?php include_once("components/contact.php") ?>
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
include_once("components/contactModal.php");
?>

<!-- Back to top button -->
<a href="#top" class="cd-top">Top</a>

</body>

<script src="js/jquery-2.2.4.min.js"></script>

<script src="js/blueimp-helper.js"></script>
<script src="js/blueimp-gallery.min.js"></script>
<script src="js/jquery.blueimp-gallery.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>

</html>