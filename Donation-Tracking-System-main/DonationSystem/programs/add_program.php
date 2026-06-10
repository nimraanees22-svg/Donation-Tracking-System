<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

if(isset($_POST['submit'])) {

    $program_name = $_POST['program_name'];
    $description = $_POST['description'];
    $budget = $_POST['budget'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $status = $_POST['status'];

    $query = "INSERT INTO programs
    (program_name, description, budget, start_date, end_date, status)
    VALUES
    ('$program_name', '$description', '$budget', '$start_date', '$end_date', '$status')";

    mysqli_query($conn, $query);

    header("Location: view_programs.php");
}

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Add Program</h2>
    <a href="view_programs.php" class="btn btn-dark">Back</a>
</div>

<div class="card p-4">

<form method="POST">

<div class="mb-3">
<label class="form-label">Program Name</label>
<input type="text" name="program_name" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Description</label>
<textarea name="description" class="form-control"></textarea>
</div>

<div class="mb-3">
<label class="form-label">Budget (PKR)</label>
<input type="number" name="budget" class="form-control" value="0">
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
Save Program
</button>

</form>

</div>

</div>
</div>

<?php include '../includes/footer.php'; ?>