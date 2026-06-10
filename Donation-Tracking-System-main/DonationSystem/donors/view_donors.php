<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$query = "SELECT * FROM donors
ORDER BY donor_id DESC";

$result = mysqli_query($conn, $query);

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">

    <div class="container-fluid">

        <div class="d-flex justify-content-between mb-4">

            <h2>All Donors</h2>

            <a href="add_donor.php"
               class="btn btn-primary">

               Add Donor

            </a>

        </div>

        <div class="card p-4">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Type</th>
                        <th>Created</th>
                        <th>Actions</th>

                    </tr>

                </thead>

                <tbody>

                <?php while($row = mysqli_fetch_assoc($result)) { ?>

                    <tr>

                        <td>
                            <?php echo $row['donor_id']; ?>
                        </td>

                        <td>
                            <?php echo $row['full_name']; ?>
                        </td>

                        <td>
                            <?php echo $row['email']; ?>
                        </td>

                        <td>
                            <?php echo $row['phone']; ?>
                        </td>

                        <td>
                            <?php echo $row['donor_type']; ?>
                        </td>

                        <td>
                            <?php echo $row['created_at']; ?>
                        </td>

                        <td>

                            <a href="edit_donor.php?id=<?php echo $row['donor_id']; ?>"
                               class="btn btn-warning btn-sm">

                               Edit

                            </a>

                            <a href="delete_donor.php?id=<?php echo $row['donor_id']; ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Delete this donor?')">

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