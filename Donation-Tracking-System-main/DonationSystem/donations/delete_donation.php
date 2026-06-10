<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$id = $_GET['id'];

$query = "DELETE FROM donations
          WHERE donation_id = '$id'";

mysqli_query($conn, $query);

header("Location: view_donations.php");

?>