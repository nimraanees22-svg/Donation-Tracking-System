<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$organizations = mysqli_query($conn, "SELECT * FROM organizations ORDER BY organization_name ASC");

if(isset($_POST['submit'])) {

    $organization_id = $_POST['organization_id'];
    $campaign_name = $_POST['campaign_name'];
    $description = $_POST['description'];
    $goal_amount = $_POST['goal_amount'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $status = $_POST['status'];

    $query = "INSERT INTO campaigns
    (organization_id, campaign_name, description, goal_amount, start_date, end_date, status)
    VALUES
    ('$organization_id', '$campaign_name', '$description', '$goal_amount', '$start_date', '$end_date', '$status')";

    mysqli_query($conn, $query);

    header("Location: view_campaigns.php");
}

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">

<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Add Campaign</h2>
    <a href="view_campaigns.php" class="btn btn-dark">Back</a>
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
<label class="form-label">Campaign Name</label>
<input type="text" name="campaign_name" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Description</label>
<textarea name="description" class="form-control"></textarea>
</div>

<div class="mb-3">
<label class="form-label">Goal Amount (PKR)</label>
<input type="number" name="goal_amount" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Start Date</label>
<input type="date" name="start_date" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">End Date</label>
<input type="date" name="end_date" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Status</label>
<select name="status" class="form-select">
<option>Pending</option>
<option>Active</option>
<option>Completed</option>
</select>
</div>

<button type="submit" name="submit" class="btn btn-primary">
Save Campaign
</button>

</form>

</div>

</div>

</div>

<?php include '../includes/footer.php'; ?>