<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$id = $_GET['id'];

$query = "DELETE FROM donor_profiles WHERE profile_id = '$id'";

mysqli_query($conn, $query);

header("Location: view_donor_profiles.php");

?>