<?php

if ($reset) {
    echo buildAlert("success", "cog", "Your cookies have been successfully reset!");
} else if ($submit) {
    if ($cookies) {
        echo buildAlert("danger", "remove-sign", "You have already sent your contact form. You may do this again in 24 hours!");
    } else {
        if (!$contact_enabled) {
            echo buildAlert("danger", "remove-sign", "The contact form is currently disabled. Please contact me in some other fashion!");
        } else {
            echo buildAlert("success", "ok-sign", "Thanks for contacting, I will get back to you shortly!");
        }
    }
} else if ($alert) {
    echo buildAlert("info", "exclamation-sign", $alert_msg);
}

function buildAlert($type = "info", $glyphicon = "info-sign", $msg) {
    return "<div class=\"container\">
                <div class=\"alert alert-$type fade in\" role=\"alert\">
                    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                    <span class=\"glyphicon glyphicon-$glyphicon\" aria-hidden=\"true\"></span> $msg
                </div>
            </div>";
}