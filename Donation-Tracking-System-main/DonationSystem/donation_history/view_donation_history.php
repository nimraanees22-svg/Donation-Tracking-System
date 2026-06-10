<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$query = "SELECT donation_history.*, donations.amount, donors.full_name
          FROM donation_history
          INNER JOIN donations ON donation_history.donation_id = donations.donation_id
          INNER JOIN donors ON donations.donor_id = donors.donor_id
          ORDER BY donation_history.history_id DESC";

$result = mysqli_query($conn, $query);

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Donation History</h2>
    <a href="add_donation_history.php" class="btn btn-primary">Add History</a>
</div>

<div class="card p-4">

<table class="table table-bordered table-hover">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Donor</th>
<th>Donation ID</th>
<th>Old Amount</th>
<th>New Amount</th>
<th>Reason</th>
<th>Changed At</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
<td><?php echo $row['history_id']; ?></td>
<td><?php echo $row['full_name']; ?></td>
<td><?php echo $row['donation_id']; ?></td>
<td>PKR <?php echo number_format($row['old_amount']); ?></td>
<td>PKR <?php echo number_format($row['new_amount']); ?></td>
<td><?php echo $row['change_reason']; ?></td>
<td><?php echo $row['changed_at']; ?></td>

<td>
<a href="delete_donation_history.php?id=<?php echo $row['history_id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Delete this history record?')">
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