<?php

if ($reset) {
    echo buildAlert("success", "cog", "Your cookies have been successfully reset!");
} else if ($submit) {
    if ($cookies) {
        echo buildAlert("danger", "remove-sign", "You have already sent your contact form. You may do this again in 24 hours!");
    } else {
        if (!$contactEnabled) {
            echo buildAlert("danger", "remove-sign", "The contact form is currently disabled. Please contact me in some other fashion!");
        } else {
            echo buildAlert("success", "ok-sign", "Thanks for contacting, I will get back to you shortly!");
        }
    }
} else if ($alert) {
    echo buildAlert("info", "exclamation-sign", $alertmsg);
}

function buildAlert($alertType = "info", $alertGlyphicon = "info-sign", $alertMsg) {
    return "<div class=\"container\">
                <div class=\"alert alert-$alertType fade in\" role=\"alert\">
                    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                    <span class=\"glyphicon glyphicon-$alertGlyphicon\" aria-hidden=\"true\"></span> $alertMsg
                </div>
            </div>";
}