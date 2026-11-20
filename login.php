<?php
include "file/includes/connection.php";
session_start();

if (isset($_POST["uname"]) && isset($_POST["passw"])) {
    $username = htmlspecialchars($_POST["uname"]);

    $stmt = mysqli_prepare($con, "SELECT * FROM accounts WHERE uname=?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $password = $_POST["passw"];
        if ($password == $user["passw"]) {
            session_regenerate_id(true);
            $_SESSION["username"] = $username;
            header("Location: http://localhost/FileSharingSystem");
        }
    }
    echo <<<HTML
    <h1>Incorrect username or password</h1><br>
    <a href="http://localhost/FileSharingSystem">Try again</a>
    HTML;
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    exit();
}
?>