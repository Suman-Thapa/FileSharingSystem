<?php
include '../includes/connection.php';
include '../includes/verifyuser.php';

$id = intval($_POST['id']);

mysqli_query($con,"DELETE FROM files WHERE id='$id'");

echo "success";
?>