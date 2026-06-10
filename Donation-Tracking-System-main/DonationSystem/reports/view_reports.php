<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

$totalDonors = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM donors"));
$totalDonations = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(amount) AS total FROM donations"));
$totalCampaigns = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM campaigns"));
$totalVolunteers = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM volunteers"));

$recentDonations = mysqli_query($conn, "
    SELECT donations.*, donors.full_name
    FROM donations
    INNER JOIN donors ON donations.donor_id = donors.donor_id
    ORDER BY donations.donation_id DESC
    LIMIT 10
");

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="container-fluid">

<h2 class="mb-4">Reports</h2>

<div class="row">

    <div class="col-md-3">
        <div class="card-box bg-blue">
            <h5>Total Donors</h5>
            <h2><?php echo $totalDonors['total']; ?></h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-box bg-green">
            <h5>Total Donations</h5>
            <h2>PKR <?php echo number_format($totalDonations['total'] ?? 0); ?></h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-box bg-orange">
            <h5>Campaigns</h5>
            <h2><?php echo $totalCampaigns['total']; ?></h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-box bg-red">
            <h5>Volunteers</h5>
            <h2><?php echo $totalVolunteers['total']; ?></h2>
        </div>
    </div>

</div>

<div class="card p-4 mt-4">

<h4 class="mb-3">Recent Donations Report</h4>

<table class="table table-bordered table-hover">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Donor</th>
<th>Amount</th>
<th>Date</th>
<th>Payment Method</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($recentDonations)) { ?>

<tr>
<td><?php echo $row['donation_id']; ?></td>
<td><?php echo $row['full_name']; ?></td>
<td>PKR <?php echo number_format($row['amount']); ?></td>
<td><?php echo $row['donation_date']; ?></td>
<td><?php echo $row['payment_method']; ?></td>
</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>
</div>

<?php include '../includes/footer.php'; ?>