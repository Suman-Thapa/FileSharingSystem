<?php
include "../constants.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["username"])) {
    $hostUrl = host;
    echo <<<HTML
    <h1>Unauthorized Access</h1><br>
    <a href="$hostUrl">Try again</a>
    HTML;
    exit();
}