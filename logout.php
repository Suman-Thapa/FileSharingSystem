<?php
include "constants.php";
session_start();
$_SESSION = [];
session_destroy();

header("Location: ".host);
exit;
