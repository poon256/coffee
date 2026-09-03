<?php
session_start();
require_once('../config/class.connect.php');

if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit;
}

$conn = new connect();
$customer_id = $_SESSION['customer_id'];



if (isset($_POST['save'])) {

    $username = $_POST['username'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $sql = "update customer set
            username = '".$username."',
            mail = '".$mail."',
            password = '".$password."'
            WHERE id = '".$customer_id."'";

    $conn->query($sql);

    $_SESSION['customer_name'] = $username;

    header("Location: data_me.php");
    exit;
}


$sql = "select * from customer where id = '".$customer_id."'";
$res = $conn->query($sql);

$username = "";
$mail = "";
$password = "";

while ($cdr = $res->fetch()) {

    $username = $cdr['username'];
    $mail = $cdr['mail'];
    $password = $cdr['password'];

}
?>

<!DOCTYPE html>
<html lang="th">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="../css/address.css">

    <title>ข้อมูลบัญชี</title>

</head>

<body>

<?php include 'menu.php'; ?>


<div class="account-layout">
    <?php include 'menuleft.php'; ?>


    <div class="datame">

        <h3>ข้อมูลบัญชี</h3>

        <form action="data_me.php"
              method="post">
            <div class="mb-3">
                <label>
                    ชื่อ :
                </label>
                <input type="text"
                       name="username"
                       class="form-control"
                       value="<?php echo htmlspecialchars($username); ?>"
                       required>
            </div>
            <div class="mb-3">
                <label>
                    อีเมล :
                </label>
                <input type="email"
                       name="mail"
                       class="form-control"
                       value="<?php echo htmlspecialchars($mail); ?>"
                       required>
            </div>
            <div class="mb-3">
                <label>
                    รหัสผ่าน :
                </label>
                <input type="password"
                       name="password"
                       class="form-control"
                       value="<?php echo htmlspecialchars($password); ?>"
                       required>
            </div>
            <button type="submit"
                    name="save"
                    class="btn btn-primary">

                บันทึกการเปลี่ยนแปลง
            </button>
        </form>
    </div>
</div>
</body>
</html>
