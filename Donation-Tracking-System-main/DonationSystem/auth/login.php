
<?php

session_start();

include '../includes/db.php';

$error = "";

if(isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin_users
              WHERE username = '$username'
              AND password = '$password'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {

        $_SESSION['admin'] = $username;

        header("Location: ../dashboard/index.php");
        exit();

    } else {

        $error = "Invalid username or password";

    }
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Admin Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

<style>

body {
    background: #0f172a;
}

.login-box {
    width: 400px;
    margin: 120px auto;
    background: white;
    padding: 30px;
    border-radius: 12px;
}

</style>

</head>

<body>

<div class="login-box">

<h3 class="text-center mb-4">Admin Login</h3>

<?php if($error != "") { ?>

<div class="alert alert-danger">
    <?php echo $error; ?>
</div>

<?php } ?>

<form method="POST">

<div class="mb-3">
<label>Username</label>
<input type="text" name="username" class="form-control" required>
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<button type="submit" name="login" class="btn btn-primary w-100">
Login
</button>

</form>

</div>

</body>
</html>