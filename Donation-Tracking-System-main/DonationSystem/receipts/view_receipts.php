<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$query = "SELECT receipts.*, donations.amount, donors.full_name
          FROM receipts
          INNER JOIN donations ON receipts.donation_id = donations.donation_id
          INNER JOIN donors ON donations.donor_id = donors.donor_id
          ORDER BY receipts.receipt_id DESC";

$result = mysqli_query($conn, $query);

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">

<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>All Receipts</h2>
    <a href="add_receipt.php" class="btn btn-primary">Add Receipt</a>
</div>

<div class="card p-4">

<table class="table table-bordered table-hover">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Receipt No</th>
<th>Donor</th>
<th>Amount</th>
<th>Issued Date</th>
<th>Notes</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
<td><?php echo $row['receipt_id']; ?></td>
<td><?php echo $row['receipt_number']; ?></td>
<td><?php echo $row['full_name']; ?></td>
<td>PKR <?php echo number_format($row['amount']); ?></td>
<td><?php echo $row['issued_date']; ?></td>
<td><?php echo $row['notes']; ?></td>

<td>
<a href="delete_receipt.php?id=<?php echo $row['receipt_id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Delete this receipt?')">
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