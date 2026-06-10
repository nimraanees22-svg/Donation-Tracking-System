<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$query = "SELECT thank_you_notes.*, donors.full_name
          FROM thank_you_notes
          INNER JOIN donors ON thank_you_notes.donor_id = donors.donor_id
          ORDER BY thank_you_notes.note_id DESC";

$result = mysqli_query($conn, $query);

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">
    <h2>Thank You Notes</h2>
    <a href="add_thank_you_note.php" class="btn btn-primary">Add Thank You Note</a>
</div>

<div class="card p-4">

<table class="table table-bordered table-hover">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Donor</th>
<th>Message</th>
<th>Sent Date</th>
<th>Method</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>
<td><?php echo $row['note_id']; ?></td>
<td><?php echo $row['full_name']; ?></td>
<td><?php echo $row['message']; ?></td>
<td><?php echo $row['sent_date']; ?></td>
<td><?php echo $row['delivery_method']; ?></td>

<td>
<a href="delete_thank_you_note.php?id=<?php echo $row['note_id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Delete this thank you note?')">
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