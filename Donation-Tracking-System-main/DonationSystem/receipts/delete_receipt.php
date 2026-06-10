<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$id = $_GET['id'];

$query = "DELETE FROM receipts WHERE receipt_id = '$id'";

mysqli_query($conn, $query);

header("Location: view_receipts.php");

?>