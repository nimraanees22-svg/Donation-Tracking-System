<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$query = "SELECT grant_applications.*, organizations.organization_name
          FROM grant_applications
          LEFT JOIN organizations
          ON grant_applications.organization_id = organizations.organization_id
          ORDER BY grant_applications.grant_id DESC";

$result = mysqli_query($conn, $query);

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Grant Applications</h2>
    <a href="add_grant_application.php" class="btn btn-primary">Add Grant Application</a>
</div>

<div class="card p-4">

<table class="table table-bordered table-hover">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Organization</th>
<th>Grant Name</th>
<th>Requested Amount</th>
<th>Status</th>
<th>Application Date</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
<td><?php echo $row['grant_id']; ?></td>
<td><?php echo $row['organization_name'] ? $row['organization_name'] : 'No Organization'; ?></td>
<td><?php echo $row['grant_name']; ?></td>
<td>PKR <?php echo number_format($row['requested_amount']); ?></td>
<td><?php echo $row['application_status']; ?></td>
<td><?php echo $row['application_date']; ?></td>

<td>
<a href="delete_grant_application.php?id=<?php echo $row['grant_id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Delete this grant application?')">
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