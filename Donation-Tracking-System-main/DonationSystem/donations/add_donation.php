<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$donors = mysqli_query($conn, "SELECT * FROM donors ORDER BY full_name ASC");
$campaigns = mysqli_query($conn, "SELECT * FROM campaigns ORDER BY campaign_name ASC");

if(isset($_POST['submit'])) {

    $donor_id = $_POST['donor_id'];
    $campaign_id = $_POST['campaign_id'];
    $amount = $_POST['amount'];
    $date = $_POST['donation_date'];
    $method = $_POST['payment_method'];
    $notes = $_POST['notes'];

    $query = "INSERT INTO donations
    (donor_id, campaign_id, amount, donation_date, payment_method, notes)
    VALUES
    ('$donor_id', '$campaign_id', '$amount', '$date', '$method', '$notes')";

    mysqli_query($conn, $query);

    header("Location: view_donations.php");
}

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">

<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Add Donation</h2>
    <a href="view_donations.php" class="btn btn-dark">Back</a>
</div>

<div class="card p-4">

<form method="POST">

<div class="mb-3">
<label class="form-label">Select Donor</label>
<select name="donor_id" class="form-select" required>
<option value="">Choose Donor</option>

<?php while($donor = mysqli_fetch_assoc($donors)) { ?>
<option value="<?php echo $donor['donor_id']; ?>">
<?php echo $donor['full_name']; ?>
</option>
<?php } ?>

</select>
</div>

<div class="mb-3">
<label class="form-label">Select Campaign</label>
<select name="campaign_id" class="form-select">
<option value="">No Campaign</option>

<?php while($campaign = mysqli_fetch_assoc($campaigns)) { ?>
<option value="<?php echo $campaign['campaign_id']; ?>">
<?php echo $campaign['campaign_name']; ?>
</option>
<?php } ?>

</select>
</div>

<div class="mb-3">
<label class="form-label">Donation Amount (PKR)</label>
<input type="number" name="amount" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Donation Date</label>
<input type="date" name="donation_date" class="form-control" required>
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
<label class="form-label">Notes</label>
<textarea name="notes" class="form-control"></textarea>
</div>

<button type="submit" name="submit" class="btn btn-primary">
Save Donation
</button>

</form>

</div>

</div>

</div>

<?php include '../includes/footer.php'; ?>