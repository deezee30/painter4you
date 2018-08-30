<div class="revbox">
    <?php
    for ($x = 0; $x < count(MEDIA_REVIEWS); ++$x) {
        echo "<div class='col-xs-6'>";
        echo    "<blockquote>";
        echo        "<p>".MEDIA_REVIEWS[$x]["review"]."</p>";
        echo        "<footer>".MEDIA_REVIEWS[$x]["customer"]."</footer>";
        echo    "</blockquote>";
        echo "</div>";
    }
    ?>
</div>