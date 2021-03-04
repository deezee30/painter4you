<?php 

// IP Address

function get_ip() {
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else
        $ip = $_SERVER['REMOTE_ADDR'];
    return $ip;
}

// String manipulation

function after($delimiter, $str) {
    if (!is_bool(strpos($str, $delimiter)))
    return substr($str, strpos($str, $delimiter) + strlen($delimiter));
};

function before($delimiter, $str) {
    return substr($str, 0, strpos($str, $delimiter));
};

function between($delimiter1, $delimiter2, $str) {
    return before($delimiter2, after($delimiter1, $str));
};

// Debugging hack: Do not use in production

function debug($text) {
    echo "<script>";
    echo "console.log(\"$text\");";
    echo "</script>";
}

?>