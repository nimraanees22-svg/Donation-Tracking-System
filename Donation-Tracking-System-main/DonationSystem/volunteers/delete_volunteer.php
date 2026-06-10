<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$id = $_GET['id'];

$query = "DELETE FROM volunteers WHERE volunteer_id = '$id'";

mysqli_query($conn, $query);

header("Location: view_volunteers.php");

?>