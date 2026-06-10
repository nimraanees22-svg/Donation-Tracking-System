<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$donors = mysqli_query($conn, "SELECT * FROM donors ORDER BY full_name ASC");

if(isset($_POST['submit'])) {

    $donor_id = $_POST['donor_id'];
    $tax_year = $_POST['tax_year'];
    $total_donated = $_POST['total_donated'];
    $notes = $_POST['notes'];

    $query = "INSERT INTO tax_records
    (donor_id, tax_year, total_donated, notes)
    VALUES
    ('$donor_id', '$tax_year', '$total_donated', '$notes')";

    mysqli_query($conn, $query);

    header("Location: view_tax_records.php");
}

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Add Tax Record</h2>
    <a href="view_tax_records.php" class="btn btn-dark">Back</a>
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
<label class="form-label">Tax Year</label>
<input type="number" name="tax_year" class="form-control" placeholder="2026" required>
</div>

<div class="mb-3">
<label class="form-label">Total Donated (PKR)</label>
<input type="number" name="total_donated" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Notes</label>
<textarea name="notes" class="form-control"></textarea>
</div>

<button type="submit" name="submit" class="btn btn-primary">
Save Tax Record
</button>

</form>

</div>

</div>
</div>

<?php include '../includes/footer.php'; ?>