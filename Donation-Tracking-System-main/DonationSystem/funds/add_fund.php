<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

if(isset($_POST['submit'])) {

    $fund_name = $_POST['fund_name'];
    $total_amount = $_POST['total_amount'];
    $remaining_amount = $_POST['remaining_amount'];
    $description = $_POST['description'];

    $query = "INSERT INTO funds
    (fund_name, total_amount, remaining_amount, description)
    VALUES
    ('$fund_name', '$total_amount', '$remaining_amount', '$description')";

    mysqli_query($conn, $query);

    header("Location: view_funds.php");
}

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">

<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Add Fund</h2>
    <a href="view_funds.php" class="btn btn-dark">Back</a>
</div>

<div class="card p-4">

<form method="POST">

<div class="mb-3">
<label class="form-label">Fund Name</label>
<input type="text" name="fund_name" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Total Amount (PKR)</label>
<input type="number" name="total_amount" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Remaining Amount (PKR)</label>
<input type="number" name="remaining_amount" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Description</label>
<textarea name="description" class="form-control"></textarea>
</div>

<button type="submit" name="submit" class="btn btn-primary">
Save Fund
</button>

</form>

</div>

</div>

</div>

<?php include '../includes/footer.php'; ?>