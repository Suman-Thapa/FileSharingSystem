<?php
include "constants.php";
include "file/includes/connection.php";
session_start();

if (isset($_POST["uname"]) && isset($_POST["passw"])) {
    $username = htmlspecialchars($_POST["uname"]);

    $stmt = mysqli_prepare($con, "SELECT * FROM accounts WHERE uname=?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    $message = "";

    if ($user) {
        if ($user["attempts"] < 5) {
            $password = $_POST["passw"];
            if ($password == $user["passw"]) {

                $stmt = mysqli_prepare($con, "UPDATE accounts SET attempts = 0 WHERE uname=?");
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);

                session_regenerate_id(true);
                $_SESSION["username"] = $username;
                header("Location: " . host);
            } else {
                $stmt = mysqli_prepare($con, "UPDATE accounts SET attempts = attempts + 1 WHERE uname=?");
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                $message = "Incorrect username or password.";
            }
        } else {
            $message = "Max attempts.";
        }
    } else {
        $message = "No such user.";
    }
    $hostUrl = host;
    echo <<<HTML
    <h1>$message</h1><br>
    <a href="$hostUrl">Try again</a>
    HTML;
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    exit();
}
?>