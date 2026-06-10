<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

if(isset($_POST['submit'])) {

    $organization_name = $_POST['organization_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $query = "INSERT INTO organizations
    (organization_name, email, phone, address)
    VALUES
    ('$organization_name', '$email', '$phone', '$address')";

    mysqli_query($conn, $query);

    header("Location: view_organizations.php");
}

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">

<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Add Organization</h2>
    <a href="view_organizations.php" class="btn btn-dark">Back</a>
</div>

<div class="card p-4">

<form method="POST">

<div class="mb-3">
<label class="form-label">Organization Name</label>
<input type="text" name="organization_name" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Phone</label>
<input type="text" name="phone" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Address</label>
<textarea name="address" class="form-control"></textarea>
</div>

<button type="submit" name="submit" class="btn btn-primary">
Save Organization
</button>

</form>

</div>

</div>

</div>

<?php include '../includes/footer.php'; ?>