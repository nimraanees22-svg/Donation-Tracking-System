<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$query = "SELECT * FROM donation_types ORDER BY donation_type_id DESC";
$result = mysqli_query($conn, $query);

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Donation Types</h2>
    <a href="add_donation_type.php" class="btn btn-primary">Add Donation Type</a>
</div>

<div class="card p-4">

<table class="table table-bordered table-hover">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Type Name</th>
<th>Description</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
<td><?php echo $row['donation_type_id']; ?></td>
<td><?php echo $row['type_name']; ?></td>
<td><?php echo $row['description']; ?></td>

<td>
<a href="delete_donation_type.php?id=<?php echo $row['donation_type_id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Delete this donation type?')">
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