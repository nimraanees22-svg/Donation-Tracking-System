<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$donations = mysqli_query($conn, "
    SELECT donations.donation_id, donations.amount, donors.full_name
    FROM donations
    INNER JOIN donors ON donations.donor_id = donors.donor_id
    ORDER BY donations.donation_id DESC
");

if(isset($_POST['submit'])) {

    $donation_id = $_POST['donation_id'];
    $payment_method = $_POST['payment_method'];
    $payment_status = $_POST['payment_status'];
    $transaction_id = $_POST['transaction_id'];
    $payment_date = $_POST['payment_date'];

    $query = "INSERT INTO payments
    (donation_id, payment_method, payment_status, transaction_id, payment_date)
    VALUES
    ('$donation_id', '$payment_method', '$payment_status', '$transaction_id', '$payment_date')";

    mysqli_query($conn, $query);

    header("Location: view_payments.php");
}

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">

<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Add Payment</h2>
    <a href="view_payments.php" class="btn btn-dark">Back</a>
</div>

<div class="card p-4">

<form method="POST">

<div class="mb-3">
<label class="form-label">Select Donation</label>
<select name="donation_id" class="form-select" required>
<option value="">Choose Donation</option>

<?php while($donation = mysqli_fetch_assoc($donations)) { ?>
<option value="<?php echo $donation['donation_id']; ?>">
Donation #<?php echo $donation['donation_id']; ?> -
<?php echo $donation['full_name']; ?> -
PKR <?php echo number_format($donation['amount']); ?>
</option>
<?php } ?>

</select>
</div>

<div class="mb-3">
<label class="form-label">Payment Method</label>
<select name="payment_method" class="form-select">
<option>Cash</option>
<option>Bank Transfer</option>
<option>JazzCash</option>
<option>EasyPaisa</option>
<option>Debit Card</option>
</select>
</div>

<div class="mb-3">
<label class="form-label">Payment Status</label>
<select name="payment_status" class="form-select">
<option>Paid</option>
<option>Pending</option>
<option>Failed</option>
</select>
</div>

<div class="mb-3">
<label class="form-label">Transaction ID</label>
<input type="text" name="transaction_id" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Payment Date</label>
<input type="date" name="payment_date" class="form-control" required>
</div>

<button type="submit" name="submit" class="btn btn-primary">
Save Payment
</button>

</form>

</div>

</div>

</div>

<?php include '../includes/footer.php'; ?>