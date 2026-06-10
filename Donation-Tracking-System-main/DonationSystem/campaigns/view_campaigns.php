<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$query = "SELECT campaigns.*, organizations.organization_name
          FROM campaigns
          LEFT JOIN organizations
          ON campaigns.organization_id = organizations.organization_id
          ORDER BY campaigns.campaign_id DESC";

$result = mysqli_query($conn, $query);

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">

<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>All Campaigns</h2>
    <a href="add_campaign.php" class="btn btn-primary">Add Campaign</a>
</div>

<div class="card p-4">

<table class="table table-bordered table-hover">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Organization</th>
<th>Name</th>
<th>Goal Amount</th>
<th>Start Date</th>
<th>End Date</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
<td><?php echo $row['campaign_id']; ?></td>
<td><?php echo $row['organization_name'] ? $row['organization_name'] : 'No Organization'; ?></td>
<td><?php echo $row['campaign_name']; ?></td>
<td>PKR <?php echo number_format($row['goal_amount']); ?></td>
<td><?php echo $row['start_date']; ?></td>
<td><?php echo $row['end_date']; ?></td>
<td><?php echo $row['status']; ?></td>

<td>
<a href="delete_campaign.php?id=<?php echo $row['campaign_id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Delete this campaign?')">
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