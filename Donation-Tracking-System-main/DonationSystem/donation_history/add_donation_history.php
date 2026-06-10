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
    $old_amount = $_POST['old_amount'];
    $new_amount = $_POST['new_amount'];
    $change_reason = $_POST['change_reason'];

    $query = "INSERT INTO donation_history
    (donation_id, old_amount, new_amount, change_reason)
    VALUES
    ('$donation_id', '$old_amount', '$new_amount', '$change_reason')";

    mysqli_query($conn, $query);

    header("Location: view_donation_history.php");
}

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Add Donation History</h2>
    <a href="view_donation_history.php" class="btn btn-dark">Back</a>
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
<label class="form-label">Old Amount (PKR)</label>
<input type="number" name="old_amount" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">New Amount (PKR)</label>
<input type="number" name="new_amount" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Change Reason</label>
<textarea name="change_reason" class="form-control"></textarea>
</div>

<button type="submit" name="submit" class="btn btn-primary">
Save History
</button>

</form>

</div>

</div>
</div>

<?php include '../includes/footer.php'; ?>