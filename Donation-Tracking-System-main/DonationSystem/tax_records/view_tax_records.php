<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$query = "SELECT tax_records.*, donors.full_name
          FROM tax_records
          INNER JOIN donors ON tax_records.donor_id = donors.donor_id
          ORDER BY tax_records.tax_record_id DESC";

$result = mysqli_query($conn, $query);

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Tax Records</h2>
    <a href="add_tax_record.php" class="btn btn-primary">Add Tax Record</a>
</div>

<div class="card p-4">

<table class="table table-bordered table-hover">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Donor</th>
<th>Tax Year</th>
<th>Total Donated</th>
<th>Notes</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
<td><?php echo $row['tax_record_id']; ?></td>
<td><?php echo $row['full_name']; ?></td>
<td><?php echo $row['tax_year']; ?></td>
<td>PKR <?php echo number_format($row['total_donated']); ?></td>
<td><?php echo $row['notes']; ?></td>

<td>
<a href="delete_tax_record.php?id=<?php echo $row['tax_record_id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Delete this tax record?')">
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