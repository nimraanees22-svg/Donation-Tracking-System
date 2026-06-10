<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$id = $_GET['id'];

$query = "DELETE FROM payments WHERE payment_id = '$id'";

mysqli_query($conn, $query);

header("Location: view_payments.php");

?>