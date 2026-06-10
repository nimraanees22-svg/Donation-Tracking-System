<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

if(isset($_POST['submit'])) {

    $type_name = $_POST['type_name'];
    $description = $_POST['description'];

    $query = "INSERT INTO donation_types
    (type_name, description)
    VALUES
    ('$type_name', '$description')";

    mysqli_query($conn, $query);

    header("Location: view_donation_types.php");
}

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Add Donation Type</h2>
    <a href="view_donation_types.php" class="btn btn-dark">Back</a>
</div>

<div class="card p-4">

<form method="POST">

<div class="mb-3">
<label class="form-label">Type Name</label>
<input type="text" name="type_name" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Description</label>
<textarea name="description" class="form-control"></textarea>
</div>

<button type="submit" name="submit" class="btn btn-primary">
Save Donation Type
</button>

</form>

</div>

</div>
</div>

<?php include '../includes/footer.php'; ?>