<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$query = "SELECT payments.*, donations.amount, donors.full_name
          FROM payments
          INNER JOIN donations ON payments.donation_id = donations.donation_id
          INNER JOIN donors ON donations.donor_id = donors.donor_id
          ORDER BY payments.payment_id DESC";

$result = mysqli_query($conn, $query);

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">

<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>All Payments</h2>
    <a href="add_payment.php" class="btn btn-primary">Add Payment</a>
</div>

<div class="card p-4">

<table class="table table-bordered table-hover">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Donor</th>
<th>Donation Amount</th>
<th>Method</th>
<th>Status</th>
<th>Transaction ID</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
<td><?php echo $row['payment_id']; ?></td>
<td><?php echo $row['full_name']; ?></td>
<td>PKR <?php echo number_format($row['amount']); ?></td>
<td><?php echo $row['payment_method']; ?></td>
<td><?php echo $row['payment_status']; ?></td>
<td><?php echo $row['transaction_id']; ?></td>
<td><?php echo $row['payment_date']; ?></td>

<td>
<a href="delete_payment.php?id=<?php echo $row['payment_id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Delete this payment?')">
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