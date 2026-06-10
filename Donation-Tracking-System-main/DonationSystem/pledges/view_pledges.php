<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$query = "SELECT pledges.*, donors.full_name
          FROM pledges
          INNER JOIN donors ON pledges.donor_id = donors.donor_id
          ORDER BY pledges.pledge_id DESC";

$result = mysqli_query($conn, $query);

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">

<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>All Pledges</h2>
    <a href="add_pledge.php" class="btn btn-primary">Add Pledge</a>
</div>

<div class="card p-4">

<table class="table table-bordered table-hover">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Donor</th>
<th>Amount</th>
<th>Pledge Date</th>
<th>Due Date</th>
<th>Status</th>
<th>Notes</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
<td><?php echo $row['pledge_id']; ?></td>
<td><?php echo $row['full_name']; ?></td>
<td>PKR <?php echo number_format($row['pledged_amount']); ?></td>
<td><?php echo $row['pledge_date']; ?></td>
<td><?php echo $row['due_date']; ?></td>
<td><?php echo $row['status']; ?></td>
<td><?php echo $row['notes']; ?></td>

<td>
<a href="delete_pledge.php?id=<?php echo $row['pledge_id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Delete this pledge?')">
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