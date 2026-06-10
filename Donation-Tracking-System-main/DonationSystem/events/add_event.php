<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

if(isset($_POST['submit'])) {

    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $location = $_POST['location'];
    $description = $_POST['description'];

    $query = "INSERT INTO events
    (event_name, event_date, location, description)
    VALUES
    ('$event_name', '$event_date', '$location', '$description')";

    mysqli_query($conn, $query);

    header("Location: view_events.php");
}

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Add Event</h2>
    <a href="view_events.php" class="btn btn-dark">Back</a>
</div>

<div class="card p-4">

<form method="POST">

<div class="mb-3">
<label class="form-label">Event Name</label>
<input type="text" name="event_name" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Event Date</label>
<input type="date" name="event_date" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Location</label>
<input type="text" name="location" class="form-control">
</div>

<div class="mb-3">
<label class="form-label">Description</label>
<textarea name="description" class="form-control"></textarea>
</div>

<button type="submit" name="submit" class="btn btn-primary">
Save Event
</button>

</form>

</div>

</div>
</div>

<?php include '../includes/footer.php'; ?>