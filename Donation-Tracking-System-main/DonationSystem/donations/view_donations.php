<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$query = "SELECT donations.*, donors.full_name, campaigns.campaign_name
          FROM donations
          INNER JOIN donors ON donations.donor_id = donors.donor_id
          LEFT JOIN campaigns ON donations.campaign_id = campaigns.campaign_id
          ORDER BY donations.donation_id DESC";

$result = mysqli_query($conn, $query);

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">

<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>All Donations</h2>
    <a href="add_donation.php" class="btn btn-primary">Add Donation</a>
</div>

<div class="card p-4">

<table class="table table-bordered table-hover">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Donor</th>
<th>Campaign</th>
<th>Amount</th>
<th>Date</th>
<th>Method</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
<td><?php echo $row['donation_id']; ?></td>
<td><?php echo $row['full_name']; ?></td>
<td><?php echo $row['campaign_name'] ? $row['campaign_name'] : 'No Campaign'; ?></td>
<td>PKR <?php echo number_format($row['amount']); ?></td>
<td><?php echo $row['donation_date']; ?></td>
<td><?php echo $row['payment_method']; ?></td>

<td>
<a href="delete_donation.php?id=<?php echo $row['donation_id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Delete this donation?')">
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