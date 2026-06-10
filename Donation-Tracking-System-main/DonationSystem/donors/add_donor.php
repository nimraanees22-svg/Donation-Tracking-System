<?php include '../includes/auth_check.php'; ?>
<?php

include '../includes/db.php';

if(isset($_POST['submit'])) {

    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $type = $_POST['donor_type'];

    $query = "INSERT INTO donors
    (full_name,email,phone,address,donor_type)

    VALUES
    ('$name','$email','$phone','$address','$type')";

    mysqli_query($conn, $query);

    header("Location: view_donors.php");
}

?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidebar.php'; ?>

<div class="main-content">

    <div class="container-fluid">

        <div class="d-flex justify-content-between mb-4">

            <h2>Add Donor</h2>

            <a href="view_donors.php"
               class="btn btn-dark">

               Back

            </a>

        </div>

        <div class="card p-4">

            <form method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Full Name
                    </label>

                    <input type="text"
                           name="full_name"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Phone
                    </label>

                    <input type="text"
                           name="phone"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Address
                    </label>

                    <textarea name="address"
                              class="form-control"></textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Donor Type
                    </label>

                    <select name="donor_type"
                            class="form-select">

                        <option>Individual</option>
                        <option>Company</option>
                        <option>Organization</option>

                    </select>

                </div>

                <button type="submit"
                        name="submit"
                        class="btn btn-primary">

                    Save Donor

                </button>

            </form>

        </div>

    </div>

</div>

<?php include '../includes/footer.php'; ?>