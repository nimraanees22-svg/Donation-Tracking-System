<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$query = "SELECT * FROM sponsors ORDER BY sponsor_id DESC";
$result = mysqli_query($conn, $query);

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Sponsors</h2>
    <a href="add_sponsor.php" class="btn btn-primary">Add Sponsor</a>
</div>

<div class="card p-4">

<table class="table table-bordered table-hover">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Amount</th>
<th>Type</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
<td><?php echo $row['sponsor_id']; ?></td>
<td><?php echo $row['sponsor_name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td>PKR <?php echo number_format($row['sponsored_amount']); ?></td>
<td><?php echo $row['sponsor_type']; ?></td>

<td>
<a href="delete_sponsor.php?id=<?php echo $row['sponsor_id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Delete this sponsor?')">
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