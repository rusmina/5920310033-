<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
  <link rel="icon" href="loco-icon.png">
</head>
<style>
    .container{
        
    }
    .row {
       padding: 20px;
       text-align: left;
       background: white;
       margin-top: 20px;
    }
    .footer {
       padding: 50px;
       text-align: left;
       background: #ddd;
       margin-top: 20px;
    }
    
</style>
<body>

<div class="container">
 <div class="row">
 <div class="col-md-3">
    <div style="font-size:28px">จัดการสินค้า
    <a href="insertPro.php" class="btn btn-success" role="basic"> เพิ่มสินค้า + </a>
    </h1>
  </div>
  </div>

  <div class="col-md-3">
  <div class="search-container">
    <form action="/showPro.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
  </div>
 </div>
 
 <p></p>
  <div class="row">
        <?php
          include "showPro.php";
        ?>
</div>

</body>
</html>
