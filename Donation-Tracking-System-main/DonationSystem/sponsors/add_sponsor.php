<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

if(isset($_POST['submit'])) {

    $sponsor_name = $_POST['sponsor_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sponsored_amount = $_POST['sponsored_amount'];
    $sponsor_type = $_POST['sponsor_type'];
    $notes = $_POST['notes'];

    $query = "INSERT INTO sponsors
    (sponsor_name, email, phone, sponsored_amount, sponsor_type, notes)
    VALUES
    ('$sponsor_name', '$email', '$phone', '$sponsored_amount', '$sponsor_type', '$notes')";

    mysqli_query($conn, $query);

    header("Location: view_sponsors.php");
}

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Add Sponsor</h2>
    <a href="view_sponsors.php" class="btn btn-dark">Back</a>
</div>

<div class="card p-4">

<form method="POST">

<div class="mb-3">
<label class="form-label">Sponsor Name</label>
<input type="text" name="sponsor_name" class="form-control" required>
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
<label class="form-label">Sponsored Amount (PKR)</label>
<input type="number" name="sponsored_amount" class="form-control" value="0">
</div>

<div class="mb-3">
<label class="form-label">Sponsor Type</label>
<select name="sponsor_type" class="form-select">
<option>Individual</option>
<option>Company</option>
<option>Organization</option>
</select>
</div>

<div class="mb-3">
<label class="form-label">Notes</label>
<textarea name="notes" class="form-control"></textarea>
</div>

<button type="submit" name="submit" class="btn btn-primary">
Save Sponsor
</button>

</form>

</div>

</div>
</div>

<?php include '../includes/footer.php'; ?>