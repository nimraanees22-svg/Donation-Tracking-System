<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

if(isset($_POST['submit'])) {

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $skills = $_POST['skills'];
    $joined_date = $_POST['joined_date'];
    $availability = $_POST['availability'];

    $query = "INSERT INTO volunteers
    (full_name, email, phone, skills, joined_date, availability)
    VALUES
    ('$full_name', '$email', '$phone', '$skills', '$joined_date', '$availability')";

    mysqli_query($conn, $query);

    header("Location: view_volunteers.php");
}

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Add Volunteer</h2>
    <a href="view_volunteers.php" class="btn btn-dark">Back</a>
</div>

<div class="card p-4">

<form method="POST">

<div class="mb-3">
<label class="form-label">Full Name</label>
<input type="text" name="full_name" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Phone</label>
<input type="text" name="phone" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Skills</label>
<input type="text" name="skills" class="form-control" placeholder="Teaching, Management, Medical, IT">
</div>

<div class="mb-3">
<label class="form-label">Joined Date</label>
<input type="date" name="joined_date" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Availability</label>
<select name="availability" class="form-select">
<option>Anytime</option>
<option>Weekdays</option>
<option>Weekends</option>
</select>
</div>

<button type="submit" name="submit" class="btn btn-primary">
Save Volunteer
</button>

</form>

</div>

</div>
</div>

<?php include '../includes/footer.php'; ?>