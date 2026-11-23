<?php
include "constants.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["username"])) {
    $hostUrl = host;
    echo <<<HTML
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Error</title>
    </head>
    <body>
        <h1>Unauthorized Access</h1><br>
        <a href="$hostUrl">Try again</a>
    </body>
    </html>   
    HTML;
    exit();
}