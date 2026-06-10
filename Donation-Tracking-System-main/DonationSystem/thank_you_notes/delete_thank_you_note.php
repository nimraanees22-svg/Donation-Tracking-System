<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$id = $_GET['id'];

$query = "DELETE FROM thank_you_notes WHERE note_id = '$id'";

mysqli_query($conn, $query);

header("Location: view_thank_you_notes.php");

?>