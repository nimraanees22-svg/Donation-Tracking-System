<?php

include '../includes/db.php';

$id = $_GET['id'];

$query = "SELECT * FROM donors
WHERE donor_id='$id'";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])) {

    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $type = $_POST['donor_type'];

    $update = "UPDATE donors SET

    full_name='$name',
    email='$email',
    phone='$phone',
    address='$address',
    donor_type='$type'

    WHERE donor_id='$id'";

    mysqli_query($conn, $update);

    header("Location: view_donors.php");
}

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">

<div class="container-fluid">

<h2 class="mb-4">
    Edit Donor
</h2>

<div class="card p-4">

<form method="POST">

<div class="mb-3">

<label>Full Name</label>

<input type="text"
       name="full_name"
       class="form-control"
       value="<?php echo $row['full_name']; ?>">

</div>

<div class="mb-3">

<label>Email</label>

<input type="email"
       name="email"
       class="form-control"
       value="<?php echo $row['email']; ?>">

</div>

<div class="mb-3">

<label>Phone</label>

<input type="text"
       name="phone"
       class="form-control"
       value="<?php echo $row['phone']; ?>">

</div>

<div class="mb-3">

<label>Address</label>

<textarea name="address"
          class="form-control"><?php echo $row['address']; ?></textarea>

</div>

<div class="mb-3">

<label>Donor Type</label>

<select name="donor_type"
        class="form-select">

<option <?php if($row['donor_type']=="Individual") echo "selected"; ?>>
    Individual
</option>

<option <?php if($row['donor_type']=="Company") echo "selected"; ?>>
    Company
</option>

<option <?php if($row['donor_type']=="Organization") echo "selected"; ?>>
    Organization
</option>

</select>

</div>

<button type="submit"
        name="update"
        class="btn btn-success">

Update Donor

</button>

</form>

</div>

</div>

</div>

<?php include '../includes/footer.php'; ?>