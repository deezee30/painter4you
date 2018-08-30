<!-- Thumbnails: 140x140 pixels PNG -->
<!-- Photos: 1328 x 747 pixels JPG -->

<?php
$imgcount = 16;
?>

<div class="row">
    <div class="col-xs-5" id="slider-thumbs">

        <!-- Bottom switcher of slider -->
        <ul class="hide-bullets">
            <?php
            $x = 0;
            for ($x = 0; $x < $imgcount; ++$x) {
                $path = "../img/2/thumbnail/" . ($x + 1) . ".png$key";

                echo "<li class='col-xs-3'>";
                echo    "<a class='thumbnail' id='carousel-selector-$x'>";
                echo        "<img src='$path' />";
                echo    "</a>";
                echo "</li>";
            }
            ?>
        </ul>
    </div>

    <div class="col-xs-7">
        <div class="col-xs-12" id="slider">

            <!-- Top part of the slider -->
            <div class="row">
                <div class="col-xs-12" id="carousel-bounding-box">
                    <div class="carousel slide" id="gallery2">

                        <!-- Carousel items -->
                        <div class="carousel-inner">
                            <?php
                            $x = 0;
                            for ($x = 0; $x < $imgcount; ++$x) {
                                $path = "../img/2/" . ($x + 1) . ".jpg$key";
                                $active = $x == 0 ? " active" : "";

                                echo "<div class='item$active' data-slide-number='$x'>";
                                echo    "<img src='$path' />";
                                echo "</div>";
                            }
                            ?>
                        </div>

                        <!-- Carousel nav -->
                        <a class="left carousel-control" href="#gallery2" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#gallery2" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>

                    </div>
                </div>
            </div>
        </div>

		<!-- Button trigger modal -->
        <button onClick="launchGallery()" type="button" class="btn btn-primary btn-lg btn-block">View more</button>
    </div>
</div>

<!-- The container for the list of example images -->
<div id="links" class="links"></div>
<!-- The Gallery as lightbox dialog, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>