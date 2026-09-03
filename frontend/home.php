<?php
session_start();
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset = utf-8" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Homepage</title>
    <link rel="stylesheet" href="../css/homepage.css"> 
</head>
<body>
    
    <?php include 'menu.php'; ?>

    <div class="card-container">
        <p class="pb">KEEN COFFEE EXPERIENCE</p>
        <button class="btn-custom">
            <img src="../img/basket.png" alt="Product" style="width: 50px; height: 50px; margin-bottom: 10px;" /><br />
            <b>สินค้าคุณภาพ</b><br /><br />
            ใส่ใจทุกขั้นตอน
        </button>
        <button class="btn-custom">
            <img src="../img/truck.png" alt="Product" style="width: 50px; height: 50px; margin-bottom: 10px;" /><br />
            <b>การจัดส่ง</b><br /><br />
            ใส่ใจทุกรายละเอียด
        </button>
        <button class="btn-custom">
            <img src="../img/CoffeeCup.png" alt="Product" style="width: 50px; height: 50px; margin-bottom: 10px;" /><br />
            <b>กาแฟถ้วยโปรด</b><br /><br />
            เพื่อให้คุณได้กาแฟรสเลิศ
        </button>
    </div>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 
</body>
</html>
