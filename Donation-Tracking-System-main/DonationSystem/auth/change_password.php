<?php

include '../includes/auth_check.php';
include '../includes/db.php';

$message = "";
$error = "";

if(isset($_POST['update'])) {

    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $username = $_SESSION['admin'];

    $query = "SELECT * FROM admin_users
              WHERE username = '$username'
              AND password = '$current_password'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 0) {

        $error = "Current password is incorrect";

    }

    elseif($new_password != $confirm_password) {

        $error = "New password and confirm password do not match";

    }

    elseif(strlen($new_password) < 8) {

        $error = "Password must be at least 8 characters";

    }

    elseif(!preg_match('/[A-Z]/', $new_password)) {

        $error = "Password must contain at least one uppercase letter";

    }

    elseif(!preg_match('/[a-z]/', $new_password)) {

        $error = "Password must contain at least one lowercase letter";

    }

    elseif(!preg_match('/[0-9]/', $new_password)) {

        $error = "Password must contain at least one number";

    }

    elseif(!preg_match('/[\W]/', $new_password)) {

        $error = "Password must contain at least one special character";

    }

    else {

        $update = "UPDATE admin_users
                   SET password = '$new_password'
                   WHERE username = '$username'";

        mysqli_query($conn, $update);

        $message = "Password changed successfully";

    }
}

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">

<div class="container-fluid">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card shadow border-0">

<div class="card-header bg-dark text-white">
    <h4 class="mb-0">
        <i class="fa-solid fa-key"></i>
        Change Password
    </h4>
</div>

<div class="card-body p-4">

<?php if($message != "") { ?>

<div class="alert alert-success">
    <?php echo $message; ?>
</div>

<?php } ?>

<?php if($error != "") { ?>

<div class="alert alert-danger">
    <?php echo $error; ?>
</div>

<?php } ?>

<form method="POST">

<div class="mb-3">
<label class="form-label">Current Password</label>

<input type="password"
       name="current_password"
       class="form-control"
       required>
</div>

<div class="mb-3">
<label class="form-label">New Password</label>

<input type="password"
       name="new_password"
       class="form-control"
       required>

<div class="form-text mt-2">

Password must contain:
<ul class="mt-2">
<li>Minimum 8 characters</li>
<li>At least 1 uppercase letter</li>
<li>At least 1 lowercase letter</li>
<li>At least 1 number</li>
<li>At least 1 special character</li>
</ul>

</div>

</div>

<div class="mb-3">
<label class="form-label">Confirm New Password</label>

<input type="password"
       name="confirm_password"
       class="form-control"
       required>
</div>

<button type="submit"
        name="update"
        class="btn btn-primary">

<i class="fa-solid fa-floppy-disk"></i>

Update Password

</button>

</form>

</div>

</div>

</div>

</div>

</div>

</div>

<?php include '../includes/footer.php'; ?>