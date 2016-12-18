<div id="top" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php
        $x = 0;
        while ($x < count($media_top)) {
            echo "<li data-target='#top' data-slide-to='$x'".($x == 0 ? " class='active'" : "")."></li>";
            $x++;
        }
        ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php
        $x = 0;
        foreach ($media_top as $item) {
            $path       = $item["path"] . $key;
            $title      = $item["title"];
            $caption    = $item["caption"];
            $active     = $x == 0 ? " active" : "";

            echo "<div class='item$active'>";
            echo    "<img src='$path' />";
            echo    "<div class='carousel-caption'>";
            echo        "<h3>$title</h3>";
            echo        "<p>$caption</p>";
            echo    "</div>";
            echo "</div>";
            $x++;
        }
        ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#top" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#top" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>