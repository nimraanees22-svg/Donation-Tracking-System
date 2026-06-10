<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$query = "SELECT * FROM beneficiaries ORDER BY beneficiary_id DESC";
$result = mysqli_query($conn, $query);

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>All Beneficiaries</h2>
    <a href="add_beneficiary.php" class="btn btn-primary">Add Beneficiary</a>
</div>

<div class="card p-4">

<table class="table table-bordered table-hover">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Name</th>
<th>Phone</th>
<th>Support Type</th>
<th>Amount Received</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
<td><?php echo $row['beneficiary_id']; ?></td>
<td><?php echo $row['full_name']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['support_type']; ?></td>
<td>PKR <?php echo number_format($row['amount_received']); ?></td>

<td>
<a href="delete_beneficiary.php?id=<?php echo $row['beneficiary_id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Delete this beneficiary?')">
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