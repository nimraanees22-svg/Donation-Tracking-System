<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$donors = mysqli_query($conn, "SELECT * FROM donors ORDER BY full_name ASC");

if(isset($_POST['submit'])) {

    $donor_id = $_POST['donor_id'];
    $message = $_POST['message'];
    $sent_date = $_POST['sent_date'];
    $delivery_method = $_POST['delivery_method'];

    $query = "INSERT INTO thank_you_notes
    (donor_id, message, sent_date, delivery_method)
    VALUES
    ('$donor_id', '$message', '$sent_date', '$delivery_method')";

    mysqli_query($conn, $query);

    header("Location: view_thank_you_notes.php");
}

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Add Thank You Note</h2>
    <a href="view_thank_you_notes.php" class="btn btn-dark">Back</a>
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
<label class="form-label">Message</label>
<textarea name="message" class="form-control" rows="5" required></textarea>
</div>

<div class="mb-3">
<label class="form-label">Sent Date</label>
<input type="date" name="sent_date" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Delivery Method</label>
<select name="delivery_method" class="form-select">
<option>Email</option>
<option>SMS</option>
<option>Letter</option>
<option>Phone Call</option>
</select>
</div>

<button type="submit" name="submit" class="btn btn-primary">
Save Thank You Note
</button>

</form>

</div>

</div>
</div>

<?php include '../includes/footer.php'; ?>