<?php

session_start();

require_once '../config/class.connect.php';

?>

<!DOCTYPE html>
<html lang="th">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<title>หน้าสั่งซื้อสินค้า</title>

<link rel="stylesheet" href="../css/shop.css">

</head>

<body>

<?php include 'menu.php'; ?>

<center>
    <h2 class="shop-title">หน้าสั่งซื้อสินค้า</h2>
</center>

<div class="card-container">

<?php

$conn = new connect();

$sql = "select *
        from inventory
        where inventory.typ_id = 3
        and inventory.status = 1";

$res = $conn->query($sql);

while ($cdr = $res->fetch())
{

?>

<div class="product-card">

    <img src="../img/images.jpg" class="product-image">

    <h6>
        <?php echo $cdr['name']; ?>
    </h6>

    <h5>
        <?php echo number_format($cdr['sale'],2); ?> บาท
    </h5>

    <input type="number"
           name="quantity"
           min="1"
           value="1"
           class="quantity">

    <br>
    <br>

    <input type="button"
           value="รายละเอียดสินค้า"
           onclick='window.open("index.php?option=det&task=def&id=<?php echo $cdr["id"]; ?>","_self")'>

    <input type="button"
           value="หยิบเข้าตะกร้า"
           onclick='window.open("index.php?option=shope&task=def&id=<?php echo $cdr["id"]; ?>","_self")'>

</div>

<?php

}

?>

</div>

<div class="footer">
    Coffes Making 2568 / Prototype1
</div>

</body>
</html>

<?php
class det
{
    function def()
    {
        $conn = new connect();

        if (!isset($_REQUEST['id']))
        {
            echo "<div class='alert alert-danger'>ไม่พบรหัสสินค้า</div>";
            return;
        }

        $id = $_REQUEST['id'];

        $sql = "select *
                from `inventory`
                where `id` = '".$id."'
                and `status` = '1'";

        $res = $conn->query($sql);

        if ($cdr = $res->fetch())
        {
            ?>

            <div class='container'>
                <div class='row'>
                    <div class='col-12'>

                        <h2 class='text-center'>รายละเอียดสินค้า</h2>

                        <div class='card mx-auto' style='max-width:500px;'>
                            <div class='card-body text-center'>

                                <img src='../img/CoffeeCup.png'
                                     style='width:150px;height:150px;margin-bottom:20px;'>

                                <h3>
                                    <?php echo $cdr['name']; ?>
                                </h3>

                                <h4>
                                    ราคา <?php echo number_format($cdr['sale'],2); ?> บาท
                                </h4>

                                <br>

                                <input type='number'
                                       name='quantity'
                                       min='1'
                                       value='1'
                                       style='width:80px;'>

                                <br>
                                <br>

                                <input type='button'
                                       value='หยิบเข้าตะกร้า'
                                       onclick='window.open("index.php?option=shope&task=def&id=<?php echo $cdr['id']; ?>","_self")'>

                                <input type='button'
                                       value='กลับ'
                                       onclick='window.open("index.php?option=shop&task=def","_self")'>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <?php
        }
        else
        {
            echo "<div class='alert alert-danger'>ไม่พบสินค้านี้</div>";
        }
    }
}
?>
</body>
</html>
