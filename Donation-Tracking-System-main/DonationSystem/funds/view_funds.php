<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$query = "SELECT * FROM funds ORDER BY fund_id DESC";
$result = mysqli_query($conn, $query);

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">

<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>All Funds</h2>
    <a href="add_fund.php" class="btn btn-primary">Add Fund</a>
</div>

<div class="card p-4">

<table class="table table-bordered table-hover">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Fund Name</th>
<th>Total Amount</th>
<th>Remaining Amount</th>
<th>Description</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
<td><?php echo $row['fund_id']; ?></td>
<td><?php echo $row['fund_name']; ?></td>
<td>PKR <?php echo number_format($row['total_amount']); ?></td>
<td>PKR <?php echo number_format($row['remaining_amount']); ?></td>
<td><?php echo $row['description']; ?></td>

<td>
<a href="delete_fund.php?id=<?php echo $row['fund_id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Delete this fund?')">
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