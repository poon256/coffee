<?php
session_start();
require_once("../config/class.connect.php");

if (isset($_REQUEST['login']))
{
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    $conn = new connect();

    $sql = "SELECT * FROM customer
            WHERE username = '".$username."'
            AND password = '".$password."'
            AND status = '1'";

    $res = $conn->query($sql);

    if ($cdr = $res->fetch())
    {
        $_SESSION['customer_id'] = $cdr['id'];
        $_SESSION['customer_name'] = $cdr['name'];

        header("location:overview.php");
        exit;
    }
    else
    {
        $error = "Username หรือ Password ไม่ถูกต้อง";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>Sign in</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php include "menu.php"; ?>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <h2 class="text-center">Sign in</h2>

            <?php
            if (isset($error))
            {
                echo "<div class='alert alert-danger'>";
                echo $error;
                echo "</div>";
            }
            ?>

            <form method="post">

                <div class="mb-3">
                    <label>Username</label>
                    <input type="text"
                           name="username"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           required>
                </div>

                <button type="submit"
                        name="login"
                        value="1"
                        class="btn btn-primary w-100">
                    Sign in
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>