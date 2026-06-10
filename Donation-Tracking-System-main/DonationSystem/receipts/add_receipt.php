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
    $receipt_number = $_POST['receipt_number'];
    $issued_date = $_POST['issued_date'];
    $notes = $_POST['notes'];

    $query = "INSERT INTO receipts
    (donation_id, receipt_number, issued_date, notes)
    VALUES
    ('$donation_id', '$receipt_number', '$issued_date', '$notes')";

    mysqli_query($conn, $query);

    header("Location: view_receipts.php");
}

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">

<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Add Receipt</h2>
    <a href="view_receipts.php" class="btn btn-dark">Back</a>
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
<label class="form-label">Receipt Number</label>
<input type="text" name="receipt_number" class="form-control" placeholder="Example: RCPT-1001" required>
</div>

<div class="mb-3">
<label class="form-label">Issued Date</label>
<input type="date" name="issued_date" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Notes</label>
<textarea name="notes" class="form-control"></textarea>
</div>

<button type="submit" name="submit" class="btn btn-primary">
Save Receipt
</button>

</form>

</div>

</div>

</div>

<?php include '../includes/footer.php'; ?>