<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$query = "SELECT * FROM events ORDER BY event_id DESC";
$result = mysqli_query($conn, $query);

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>All Events</h2>
    <a href="add_event.php" class="btn btn-primary">Add Event</a>
</div>

<div class="card p-4">

<table class="table table-bordered table-hover">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Event Name</th>
<th>Date</th>
<th>Location</th>
<th>Description</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
<td><?php echo $row['event_id']; ?></td>
<td><?php echo $row['event_name']; ?></td>
<td><?php echo $row['event_date']; ?></td>
<td><?php echo $row['location']; ?></td>
<td><?php echo $row['description']; ?></td>

<td>
<a href="delete_event.php?id=<?php echo $row['event_id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Delete this event?')">
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