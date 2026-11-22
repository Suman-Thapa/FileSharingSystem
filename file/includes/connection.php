<?php
const db_host = "localhost:3306";
const db_user = "root";
const db_password = "";
const db_name = "filemanagement";
$con = mysqli_connect(db_host, db_user, db_password, db_name);
if(!$con){
    die("Canot connect");
}



?>
