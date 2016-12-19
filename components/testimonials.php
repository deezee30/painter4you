<div class="revbox">
    <?php
    for ($x = 0; $x < count($media_reviews); ++$x) {
        echo "<div class='col-xs-6'>";
        echo    "<blockquote>";
        echo        "<p>".$media_reviews[$x]["review"]."</p>";
        echo        "<footer>".$media_reviews[$x]["customer"]."</footer>";
        echo    "</blockquote>";
        echo "</div>";
    }
    ?>
</div>