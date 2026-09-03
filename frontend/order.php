<?php
session_start();
?>
<!DOCTYPE html>
<html lang="th">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

<link rel="stylesheet" href="../css/order.css">

<title>Prototype</title>
</head>

<body>

<?php include 'menu.php'; ?>

<div class="container-fluid">
    <div class="row">

        <!-- เมนูซ้าย -->
        <div class="col-md-2">
            <?php include("menuleft.php"); ?>
        </div>


        <!-- เนื้อหาด้านขวา -->
        <div class="col-md-10">

            <div class="card2">

                <div class="card-container">

                    <div class="d-flex justify-content-between align-items-center">

                        <p class="mb-0">
                            รายการสั่งซื้อ
                        </p>

                        <input
                            class="button"
                            type="button"
                            value="ดูสินค้า"
                            onclick='window.open("shop.php","_self")'
                        >

                    </div>

                    <hr>

                    <table class="order">

                        <thead>
                            <tr>
                                <th>หมายเลขคำสั่งซื้อ</th>
                                <th>วันสั่งซื้อ</th>
                                <th>ราคา</th>
                                <th>สถานะ</th>
                                <th>ดูรายละเอียด</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>ยังไม่มีคำสั่งซื้อ</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>
</div>

</body>
</html>