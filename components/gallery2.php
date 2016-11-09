<!-- Thumbnails: 140x140 pixels -->
<!-- Photos: Either 1000x750 or 750x1000 pixels -->

<div class="row">
    <div class="col-sm-5" id="slider-thumbs">

        <!-- Bottom switcher of slider -->
        <ul class="hide-bullets">
            <li class="col-sm-3">
                <a class="thumbnail" id="carousel-selector-0"><img src="../img/2/thumbnail/1.jpg"></a>
            </li>
            <li class="col-sm-3">
                <a class="thumbnail" id="carousel-selector-1"><img src="../img/2/thumbnail/2.jpg"></a>
            </li>
            <li class="col-sm-3">
                <a class="thumbnail" id="carousel-selector-2"><img src="../img/2/thumbnail/3.jpg"></a>
            </li>
            <li class="col-sm-3">
                <a class="thumbnail" id="carousel-selector-3"><img src="../img/2/thumbnail/4.jpg"></a>
            </li>
            <li class="col-sm-3">
                <a class="thumbnail" id="carousel-selector-4"><img src="../img/2/thumbnail/5.jpg"></a>
            </li>
            <li class="col-sm-3">
                <a class="thumbnail" id="carousel-selector-5"><img src="../img/2/thumbnail/6.jpg"></a>
            </li>
            <li class="col-sm-3">
                <a class="thumbnail" id="carousel-selector-6"><img src="../img/2/thumbnail/7.jpg"></a>
            </li>
            <li class="col-sm-3">
                <a class="thumbnail" id="carousel-selector-7"><img src="../img/2/thumbnail/8.jpg"></a>
            </li>
            <li class="col-sm-3">
                <a class="thumbnail" id="carousel-selector-8"><img src="../img/2/thumbnail/9.jpg"></a>
            </li>
            <li class="col-sm-3">
                <a class="thumbnail" id="carousel-selector-9"><img src="../img/2/thumbnail/10.jpg"></a>
            </li>
            <li class="col-sm-3">
                <a class="thumbnail" id="carousel-selector-10"><img src="../img/2/thumbnail/11.jpg"></a>
            </li>
            <li class="col-sm-3">
                <a class="thumbnail" id="carousel-selector-11"><img src="../img/2/thumbnail/12.jpg"></a>
            </li>
            <li class="col-sm-3">
                <a class="thumbnail" id="carousel-selector-12"><img src="../img/2/thumbnail/13.jpg"></a>
            </li>
            <li class="col-sm-3">
                <a class="thumbnail" id="carousel-selector-13"><img src="../img/2/thumbnail/14.jpg"></a>
            </li>
            <li class="col-sm-3">
                <a class="thumbnail" id="carousel-selector-14"><img src="../img/2/thumbnail/15.jpg"></a>
            </li>
            <li class="col-sm-3">
                <a class="thumbnail" id="carousel-selector-15"><img src="../img/2/thumbnail/16.jpg"></a>
            </li>
        </ul>

        <!-- Button trigger modal -->
        <button onClick="launchGallery()" type="button" class="btn btn-primary btn-lg btn-block">View more</button>
    </div>
    <div class="col-sm-7">
        <div class="col-xs-12" id="slider">

            <!-- Top part of the slider -->
            <div class="row">
                <div class="col-sm-12" id="carousel-bounding-box">
                    <div class="carousel slide" id="gallery2">

                        <!-- Carousel items -->
                        <div class="carousel-inner">
                            <div class="active item" data-slide-number="0">
                                <img src="../img/2/1.jpg">
                            </div>
                            <div class="item" data-slide-number="1">
                                <img src="../img/2/2.jpg">
                            </div>
                            <div class="item" data-slide-number="2">
                                <img src="../img/2/3.jpg">
                            </div>
                            <div class="item" data-slide-number="3">
                                <img src="../img/2/4.jpg">
                            </div>
                            <div class="item" data-slide-number="4">
                                <img src="../img/2/5.jpg">
                            </div>
                            <div class="item" data-slide-number="5">
                                <img src="../img/2/6.jpg">
                            </div>
                            <div class="item" data-slide-number="6">
                                <img src="../img/2/7.jpg">
                            </div>
                            <div class="item" data-slide-number="7">
                                <img src="../img/2/8.jpg">
                            </div>
                            <div class="item" data-slide-number="8">
                                <img src="../img/2/9.jpg">
                            </div>
                            <div class="item" data-slide-number="9">
                                <img src="../img/2/10.jpg">
                            </div>
                            <div class="item" data-slide-number="10">
                                <img src="../img/2/11.jpg">
                            </div>
                            <div class="item" data-slide-number="11">
                                <img src="../img/2/12.jpg">
                            </div>
                            <div class="item" data-slide-number="12">
                                <img src="../img/2/13.jpg">
                            </div>
                            <div class="item" data-slide-number="13">
                                <img src="../img/2/14.jpg">
                            </div>
                            <div class="item" data-slide-number="14">
                                <img src="../img/2/15.jpg">
                            </div>
                            <div class="item" data-slide-number="15">
                                <img src="../img/2/16.jpg">
                            </div>
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