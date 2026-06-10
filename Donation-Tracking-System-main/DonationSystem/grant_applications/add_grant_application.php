<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$organizations = mysqli_query($conn, "SELECT * FROM organizations ORDER BY organization_name ASC");

if(isset($_POST['submit'])) {

    $organization_id = $_POST['organization_id'];
    $grant_name = $_POST['grant_name'];
    $requested_amount = $_POST['requested_amount'];
    $application_status = $_POST['application_status'];
    $application_date = $_POST['application_date'];
    $notes = $_POST['notes'];

    $query = "INSERT INTO grant_applications
    (organization_id, grant_name, requested_amount, application_status, application_date, notes)
    VALUES
    ('$organization_id', '$grant_name', '$requested_amount', '$application_status', '$application_date', '$notes')";

    mysqli_query($conn, $query);

    header("Location: view_grant_applications.php");
}

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Add Grant Application</h2>
    <a href="view_grant_applications.php" class="btn btn-dark">Back</a>
</div>

<div class="card p-4">

<form method="POST">

<div class="mb-3">
<label class="form-label">Select Organization</label>
<select name="organization_id" class="form-select">
<option value="">No Organization</option>

<?php while($org = mysqli_fetch_assoc($organizations)) { ?>
<option value="<?php echo $org['organization_id']; ?>">
<?php echo $org['organization_name']; ?>
</option>
<?php } ?>

</select>
</div>

<div class="mb-3">
<label class="form-label">Grant Name</label>
<input type="text" name="grant_name" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Requested Amount (PKR)</label>
<input type="number" name="requested_amount" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Application Status</label>
<select name="application_status" class="form-select">
<option>Pending</option>
<option>Approved</option>
<option>Rejected</option>
</select>
</div>

<div class="mb-3">
<label class="form-label">Application Date</label>
<input type="date" name="application_date" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Notes</label>
<textarea name="notes" class="form-control"></textarea>
</div>

<button type="submit" name="submit" class="btn btn-primary">
Save Grant Application
</button>

</form>

</div>

</div>
</div>

<?php include '../includes/footer.php'; ?>