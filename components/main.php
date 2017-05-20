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
                    <!-- display contact info -->
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
    <?php include_once("alert.php") ?>

    <!-- carousel -->
    <?php include_once("gallery1.php") ?>

    <!-- main -->
    <div class="container">
        <div class="row">

            <!-- left -->
            <div class="col-sm-2" id="leftCol">
                <!-- sliding nav bar -->
                <ul class="box nav nav-stacked" id="sidebar">
                    <li><a href="#top"><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span> Top</a></li>
                    <li><a href="#services"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Services</a></li>
                    <li><a href="#gallery"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Recent Work</a></li>
                    <li><a href="#reviews"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Reviews</a></li>
                    <li><a href="#extra"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Extra Info</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#contactModal"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Contact</a></li>
                </ul>
            </div>
            <!-- /left -->

            <!-- right -->
            <div class="vertical col-sm-10" id="rightCol">

                <!-- about -->
                <div class="section" id="services">
                    <h1><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Services <small>What I can do for you</small></h1>
                </div>

                <?php include_once("services.html") ?>
                <hr class="separator" />
                <!-- /about -->

                <!-- gallery -->
                <div class="section" id="gallery">
                    <h1><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Gallery <small>Some of my previous work</small></h1>
                </div>

                <?php include_once("gallery2.php") ?>
                <hr class="separator" />
                <!-- /gallery -->

                <!-- reviews -->
                <div class="section" id="reviews">
                    <h1><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Reviews <small>Read what other customers think</small></h1>
                </div>

                <?php include_once("testimonials.php") ?>
                <hr class="separator" />
                <!-- /reviews -->

                <!-- extra -->
                <div class="section" id="extra">
                    <h1><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Additional Info <small>Quotes, questions and extra information</small></h1>
                </div>

                <?php include_once("extra.php") ?>
                <!-- /extra -->
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
include_once("contactModal.php");
?>

<!-- Back to top button -->
<a href="#top" class="cd-top">Top</a>