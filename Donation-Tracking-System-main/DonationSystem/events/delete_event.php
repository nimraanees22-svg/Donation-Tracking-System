<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$id = $_GET['id'];

$query = "DELETE FROM events WHERE event_id = '$id'";

mysqli_query($conn, $query);

header("Location: view_events.php");

?>