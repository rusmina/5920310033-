<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<link rel="icon" href="loco-icon.png">
  <!-- <link rel="stylesheet" href="style.css">  -->
</head>
<style>
   *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial;
    /* color: #211a1a; */
    font-size: 1.0em;
}

#shopping-cart{
    margin: 40px;
}
#product-grid{
    margin: 40px;
}

#shopping-cart table{
    width:100%;
    background-color: #f0f0f0;
}

#shopping-cart table td{
    padding: 1rem;
    background-color: #fff;
}

.txt-heading{
    color: #211a1a;
    border-bottom: 1px solid #e0e0e0;
    overflow: auto;
}

#btnEmpty{
    background-color: #fff;
    border: #d00000 1px solid;
    padding: 5px 10px;
    float: right;
    text-decoration: none;
    border-radius: 3px;
    margin: 10px 0;
    cursor: pointer;
}

.btnAddAction{
    padding: 5px 10px;
    margin-left: 5px;
    background-color: #e0e0e0 1px solid;
    color: #211a1a;
    float: right;
    text-decoration: none;
    border-radius: 3px;
    cursor: pointer;
}

#product-grid .txt-heading{
    margin-bottom: 10px;
}

.product-item{
    float: left;
    background: #fff;
    margin: 30px 30px 0px 0px;
    border: #e0e0e0 1px solid;
}

.product-image{
    height: auto;
    width: 1%;
    background-color: #fff; 
    text-align: center;
}

.clear-float{
    clear: both;
}

.tbl-cart{
    font-size: 0.9em;
}
.tbl-cart th {
    font-weight: normal;
}
.product-title{
    margin-bottom: 20px;
}
.product-price{
    float: left;
}
.product-quantity{
    padding: 5px 10px;
    border-radius: 3px;
    border: #e0e0e0 1px solid;
}

.product-title-footer{
    padding: 15px 15px 0 15px;
    overflow: auto;
}

.cart-item-image{
    width: 80px;
    height: 80px;
    border-radius: 50px;
    border: #e0e0e0 1px solid;
    padding: 5px;
    vertical-align: middle;
    margin-right: 15px;
}


</style>
<body>
<?php
    include "menu.php";
    include "dbconnect.php";
    $pro_search = $_POST['pro_search'];
    $p = '%'.$pro_search.'%';
    $sql = "SELECT * FROM product	WHERE proname LIKE '$p'";	
    $result = mysqli_query($conn, $sql);

?>


<div class="container">
   <div class="row">
    <div class="col-md-3">
      <div style="font-size:28px">  จัดการสินค้า
      <a href="insertPro.php" class="btn btn-success" role="basic"> เพิ่มสินค้า + </a>
    </div>
  </div>

  <div class="col-md-3">
   <div class="search-container">
     <form action="product.php" method="post">
       <input type="text" placeholder="ชื่อสินค้า..." name="pro_search">
       <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
     </form>
    
   </div>
  </div>
 </div>

 <br>

  <div class="row" style="background-color: white">
    <div id="shopping-cart">
    

    <div id="product-grid">
        <div class="txt-heading" style="font-size:24px">Products IN Stock    <a href="showPro.php" class="btn btn-btn btn-info" role="basic"> แสดงรายการสินค้าทั้งหมด  <i class="fa">&#xf0ea;</i> </a></div>


        <?php

           while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

          //  $product_array = $db_handle->runQuery("SELECT * FROM product ORDER BY proid ASC");
          //  if (!empty($product_array)) {
          //      foreach($product_array as $key => $value) {

        ?>

        <div class="product-item">
           <from action="index.php?action=add&code">
              <div class="product-image">
                 <img src= " <?php echo $row['pro_image']; ?>" style="width:350px" alt="">
              </div>
              <div class="product-title-footer">
                <div class="product-title" style="font-size: 24px;"><center><?php echo $row['proname']; ?></center></div>
                   <p class="price"><center><?php echo number_format ($row['proprice'],2); ?> ฿</center></p>
                      ราคาต้นทุน <?php echo $row['procost']; ?> ฿ / ราคาขายส่ง <?php echo $row['prosale']; ?> ฿
                    <br>สินค้าในสต๊อก <?php echo $row['prostock']; ?> ชิ้น / วันที่สต๊อกเข้า <?php echo $row['stockDate']; ?> </p>
                <div class="cart-action">
                    <input class="input-sm" type="number" value="0 " id="inputsm" type="text" size="2">
                    <input type="submit" value="สต๊อกเพิ่ม +" class="btnAddAction" name="prostock">
                </div>
              </div>
           </from>
        </div>   
        
        <?php
               }

            
        ?>
          
    </div>

</div>
</div>
</div>

</body>
</html>
