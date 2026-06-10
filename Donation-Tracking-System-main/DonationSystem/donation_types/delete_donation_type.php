<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$id = $_GET['id'];

$query = "DELETE FROM donation_types WHERE donation_type_id = '$id'";

mysqli_query($conn, $query);

header("Location: view_donation_types.php");

?>