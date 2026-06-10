<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$id = $_GET['id'];

$query = "DELETE FROM tax_records WHERE tax_record_id = '$id'";

mysqli_query($conn, $query);

header("Location: view_tax_records.php");

?>