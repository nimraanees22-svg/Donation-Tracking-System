<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$donors = mysqli_query($conn, "SELECT * FROM donors ORDER BY full_name ASC");

if(isset($_POST['submit'])) {

    $donor_id = $_POST['donor_id'];
    $pledged_amount = $_POST['pledged_amount'];
    $pledge_date = $_POST['pledge_date'];
    $due_date = $_POST['due_date'];
    $status = $_POST['status'];
    $notes = $_POST['notes'];

    $query = "INSERT INTO pledges
    (donor_id, pledged_amount, pledge_date, due_date, status, notes)
    VALUES
    ('$donor_id', '$pledged_amount', '$pledge_date', '$due_date', '$status', '$notes')";

    mysqli_query($conn, $query);

    header("Location: view_pledges.php");
}

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">

<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Add Pledge</h2>
    <a href="view_pledges.php" class="btn btn-dark">Back</a>
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
<label class="form-label">Pledged Amount (PKR)</label>
<input type="number" name="pledged_amount" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Pledge Date</label>
<input type="date" name="pledge_date" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Due Date</label>
<input type="date" name="due_date" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Status</label>
<select name="status" class="form-select">
<option>Pending</option>
<option>Fulfilled</option>
<option>Cancelled</option>
</select>
</div>

<div class="mb-3">
<label class="form-label">Notes</label>
<textarea name="notes" class="form-control"></textarea>
</div>

<button type="submit" name="submit" class="btn btn-primary">
Save Pledge
</button>

</form>

</div>

</div>

</div>

<?php include '../includes/footer.php'; ?>