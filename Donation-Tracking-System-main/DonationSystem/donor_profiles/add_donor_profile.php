<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$donors = mysqli_query($conn, "SELECT * FROM donors ORDER BY full_name ASC");

if(isset($_POST['submit'])) {

    $donor_id = $_POST['donor_id'];
    $preferences = $_POST['preferences'];
    $notes = $_POST['notes'];
    $preferred_contact = $_POST['preferred_contact'];

    $query = "INSERT INTO donor_profiles
    (donor_id, preferences, notes, preferred_contact)
    VALUES
    ('$donor_id', '$preferences', '$notes', '$preferred_contact')";

    mysqli_query($conn, $query);

    header("Location: view_donor_profiles.php");
}

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Add Donor Profile</h2>
    <a href="view_donor_profiles.php" class="btn btn-dark">Back</a>
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
<label class="form-label">Preferences</label>
<textarea name="preferences" class="form-control"></textarea>
</div>

<div class="mb-3">
<label class="form-label">Notes</label>
<textarea name="notes" class="form-control"></textarea>
</div>

<div class="mb-3">
<label class="form-label">Preferred Contact</label>
<select name="preferred_contact" class="form-select">
<option>Email</option>
<option>Phone</option>
<option>SMS</option>
<option>WhatsApp</option>
</select>
</div>

<button type="submit" name="submit" class="btn btn-primary">
Save Profile
</button>

</form>

</div>

</div>
</div>

<?php include '../includes/footer.php'; ?>