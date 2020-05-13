<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<link rel="icon" href="loco-icon.png">
</head>


<style>

</style>
</head>

<body style="background-color:#ECECEC">

<?php
   include "menu.php";
?>
<br>
<div class="container">
    <div class="row">
      <div class="txt-heading" style="font-size:24px">    
      <a href="showOrder.php" class="btn btn-btn btn-success" role="basic"> แสดงข้อมูลออเดอร์ทั้งหมด   <i class="fa">&#xf0ea;</i> </a>  
      <a href="showPro.php" class="btn btn-btn btn-info" role="basic"> แสดงรายการสินค้าทั้งหมด  <i class="fa">&#xf0ea;</i> </a></div>

      <?php 
        include "showOrder.php";
      ?>
    </div>
</div>

</body>
</html>




