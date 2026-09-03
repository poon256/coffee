```php
<?php
session_start();
require_once('../config/class.connect.php');

$msg = "";

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $mail = $_POST['mail'];

    $conn = new connect();

    // เช็ค Email ซ้ำ
    $sql = "selcet * from customer where mail = '".$mail."'";
    $res = $conn->query($sql);

    if ($res->rowCount() > 0) {

        $msg = "Email นี้มีผู้ใช้งานแล้ว";

    } else {

        $sql = "insert into customer set
                username = '".$username."',
                password = '".$password."',
                mail = '".$mail."',
                status = '1'";

        $conn->query($sql);

        $msg = "สมัครสมาชิกสำเร็จ";
    }
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <title>สมัครสมาชิก</title>
</head>

<body>

<?php include 'menu.php'; ?>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card">

                <div class="card-header text-center">
                    <h3>สมัครสมาชิก</h3>
                </div>

                <div class="card-body">

                    <?php
                    if ($msg != "") {
                        echo "<div class='alert alert-info'>".$msg."</div>";
                    }
                    ?>

                    <form method="post">

                        <div class="mb-3">
                            <label>ชื่อผู้ใช้</label>

                            <input type="text"
                                   name="username"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label>รหัสผ่าน</label>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label>อีเมล</label>

                            <input type="email"
                                   name="mail"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="d-grid">

                            <button type="submit"
                                    name="register"
                                    class="btn btn-primary">
                                สมัครสมาชิก
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
