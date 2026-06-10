<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$query = "SELECT * FROM programs ORDER BY program_id DESC";
$result = mysqli_query($conn, $query);

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Programs</h2>
    <a href="add_program.php" class="btn btn-primary">Add Program</a>
</div>

<div class="card p-4">

<table class="table table-bordered table-hover">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Program Name</th>
<th>Budget</th>
<th>Start Date</th>
<th>End Date</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
<td><?php echo $row['program_id']; ?></td>
<td><?php echo $row['program_name']; ?></td>
<td>PKR <?php echo number_format($row['budget']); ?></td>
<td><?php echo $row['start_date']; ?></td>
<td><?php echo $row['end_date']; ?></td>
<td><?php echo $row['status']; ?></td>

<td>
<a href="delete_program.php?id=<?php echo $row['program_id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Delete this program?')">
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