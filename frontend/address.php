<?php
session_start();
require_once('../config/class.connect.php');

if (!isset($_SESSION['customer_id'])) {
    header("location:login.php");
    exit();
}

$customer_id = $_SESSION['customer_id'];
$conn = new connect();

$msg = "";

if (isset($_POST['save'])) {

    $name = $_POST['name'];
    $address = $_POST['address'];
    $province = $_POST['province'];
    $zip = $_POST['zip'];
    $tel = $_POST['tel'];
    $tax_id = $_POST['tax_id'];

    $sql = "UPDATE customer SET
                name = '".$name."',
                address = '".$address."',
                province = '".$province."',
                zip = '".$zip."',
                tel = '".$tel."',
                tax_id = '".$tax_id."'
            WHERE id = '".$customer_id."'";

    $conn->query($sql);

    $msg = "บันทึกข้อมูลเรียบร้อยแล้ว";
}

$sql = "SELECT * FROM customer WHERE id = '".$customer_id."'";
$res = $conn->query($sql);

$name = "";
$address = "";
$province = "";
$zip = "";
$tel = "";
$mail = "";
$tax_id = "";

while ($cdr = $res->fetch()) {

    $name = $cdr['name'];
    $address = $cdr['address'];
    $province = $cdr['province'];
    $zip = $cdr['zip'];
    $tel = $cdr['tel'];
    $mail = $cdr['mail'];
    $tax_id = $cdr['tax_id'];
}
?>

<!DOCTYPE html>
<html lang="th">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

<link rel="stylesheet" href="../css/address.css">

<title>ที่อยู่</title>

</head>

<body>

<?php include 'menu.php'; ?>

<div class="container-fluid">

    <div class="row">

        <!-- เมนูซ้าย -->
        <div class="col-md-2">

            <?php include("menuleft.php"); ?>

        </div>


        <!-- เนื้อหา -->
        <div class="col-md-10">

            <h2>ที่อยู่</h2>


            <?php if ($msg != "") { ?>

                <div class="alert alert-success">
                    <?php echo $msg; ?>
                </div>

            <?php } ?>


            <form method="post">

                <table class="table table-bordered">

                    <tr>

                        <td width="200">
                            ชื่อ
                        </td>

                        <td>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="<?php echo htmlspecialchars($name); ?>"
                                required>

                        </td>

                    </tr>


                    <tr>

                        <td>
                            ที่อยู่
                        </td>

                        <td>

                            <input
                                type="text"
                                name="address"
                                class="form-control"
                                value="<?php echo htmlspecialchars($address); ?>"
                                required>

                        </td>

                    </tr>


                    <tr>

                        <td>
                            จังหวัด
                        </td>

                        <td>

                            <input
                                type="text"
                                name="province"
                                class="form-control"
                                value="<?php echo htmlspecialchars($province); ?>"
                                required>

                        </td>

                    </tr>


                    <tr>

                        <td>
                            รหัสไปรษณีย์
                        </td>

                        <td>

                            <input
                                type="text"
                                name="zip"
                                class="form-control"
                                value="<?php echo htmlspecialchars($zip); ?>"
                                required>

                        </td>

                    </tr>


                    <tr>

                        <td>
                            โทรศัพท์
                        </td>

                        <td>

                            <input
                                type="text"
                                name="tel"
                                class="form-control"
                                value="<?php echo htmlspecialchars($tel); ?>"
                                required>

                        </td>

                    </tr>


                    <tr>

                        <td>
                            Tax ID
                        </td>

                        <td>

                            <input
                                type="text"
                                name="tax_id"
                                class="form-control"
                                value="<?php echo htmlspecialchars($tax_id); ?>">

                        </td>

                    </tr>


                    <tr>

                        <td colspan="2" class="text-center">

                            <button
                                type="submit"
                                name="save"
                                class="btn btn-primary">

                                บันทึกข้อมูล

                            </button>


                            <a
                                href="overview.php"
                                class="btn btn-secondary">

                                ยกเลิก

                            </a>

                        </td>

                    </tr>

                </table>

            </form>

        </div>

    </div>

</div>

</body>

</html>
