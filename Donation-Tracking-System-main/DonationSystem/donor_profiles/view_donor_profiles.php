<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$query = "SELECT donor_profiles.*, donors.full_name, donors.email, donors.phone
          FROM donor_profiles
          INNER JOIN donors ON donor_profiles.donor_id = donors.donor_id
          ORDER BY donor_profiles.profile_id DESC";

$result = mysqli_query($conn, $query);

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Donor Profiles</h2>
    <a href="add_donor_profile.php" class="btn btn-primary">Add Donor Profile</a>
</div>

<div class="card p-4">

<table class="table table-bordered table-hover">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Donor</th>
<th>Email</th>
<th>Phone</th>
<th>Preferences</th>
<th>Preferred Contact</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
<td><?php echo $row['profile_id']; ?></td>
<td><?php echo $row['full_name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['preferences']; ?></td>
<td><?php echo $row['preferred_contact']; ?></td>

<td>
<a href="delete_donor_profile.php?id=<?php echo $row['profile_id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Delete this donor profile?')">
Delete
</a>
</td>
</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>
</div>

<?php include '../includes/footer.php'; ?>