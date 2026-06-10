<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$query = "SELECT * FROM volunteers ORDER BY volunteer_id DESC";
$result = mysqli_query($conn, $query);

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Volunteers</h2>
    <a href="add_volunteer.php" class="btn btn-primary">Add Volunteer</a>
</div>

<div class="card p-4">

<table class="table table-bordered table-hover">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Skills</th>
<th>Joined Date</th>
<th>Availability</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
<td><?php echo $row['volunteer_id']; ?></td>
<td><?php echo $row['full_name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['skills']; ?></td>
<td><?php echo $row['joined_date']; ?></td>
<td><?php echo $row['availability']; ?></td>

<td>
<a href="delete_volunteer.php?id=<?php echo $row['volunteer_id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Delete this volunteer?')">
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