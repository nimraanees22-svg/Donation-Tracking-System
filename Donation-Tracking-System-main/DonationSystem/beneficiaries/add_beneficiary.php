<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

if(isset($_POST['submit'])) {

    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $support_type = $_POST['support_type'];
    $amount_received = $_POST['amount_received'];

    $query = "INSERT INTO beneficiaries
    (full_name, phone, address, support_type, amount_received)
    VALUES
    ('$full_name', '$phone', '$address', '$support_type', '$amount_received')";

    mysqli_query($conn, $query);

    header("Location: view_beneficiaries.php");
}

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Add Beneficiary</h2>
    <a href="view_beneficiaries.php" class="btn btn-dark">Back</a>
</div>

<div class="card p-4">

<form method="POST">

<div class="mb-3">
<label class="form-label">Full Name</label>
<input type="text" name="full_name" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Phone</label>
<input type="text" name="phone" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Address</label>
<textarea name="address" class="form-control"></textarea>
</div>

<div class="mb-3">
<label class="form-label">Support Type</label>
<input type="text" name="support_type" class="form-control" placeholder="Education, Medical, Food, Shelter">
</div>

<div class="mb-3">
<label class="form-label">Amount Received (PKR)</label>
<input type="number" name="amount_received" class="form-control" value="0">
</div>

<button type="submit" name="submit" class="btn btn-primary">
Save Beneficiary
</button>

</form>

</div>

</div>
</div>

<?php include '../includes/footer.php'; ?>