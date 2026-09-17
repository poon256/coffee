<?php
session_start();

if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/menu.css">

    <title>Overview</title>
</head>

<body>

<!-- เมนูบน -->
<?php include 'menu.php'; ?>


<!-- เนื้อหาด้านล่าง -->
<div class="overview-layout">

    <!-- เมนูซ้าย -->
    <div class="col-md-2">
        <?php include 'menuleft.php'; ?>
    </div>


    <!-- เนื้อหา Overview -->
    <div class="overview-content">

        <div class="card p-4">

            <h2>
                ยินดีต้อนรับ
                <?php echo $_SESSION['customer_name']; ?>
            </h2>

            <p>
                คุณสามารถดูรายละเอียดคำสั่งซื้อที่ผ่านมา
                จัดการข้อมูลที่อยู่สำหรับการจัดส่งสินค้า
                และแก้ไขข้อมูลบัญชีได้
            </p>

        </div>

    </div>

</div>

</body>
</html>