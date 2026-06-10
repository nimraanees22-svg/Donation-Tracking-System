<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$id = $_GET['id'];

$query = "DELETE FROM grant_applications WHERE grant_id = '$id'";

mysqli_query($conn, $query);

header("Location: view_grant_applications.php");

?>