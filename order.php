<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
  <link rel="icon" href="loco-icon.png">
</head>
<style>
    .container {
      height: 100%;
    }
    .col-md-10 .col-md-offset-1{
      position: relative;
      min-height: 1px;
      padding-right: 15px;
      padding-left: 15px;
    }
    .from-control{
      display: block;
      width: 100%;
    }
    .row {
       padding: 20px;
       text-align: left;
       background: white;
       margin-top: 20px;
    }
    div {
    display: block;
    }

</style>
<body>

<?php
  include "dbconnect.php";
  include "menu.php";
  $search_all = $_POST['search_all'];
  $p = '%'.$search_all.'%';
  $sql = "SELECT * FROM customer WHERE cusname LIKE '$p'";	
  $result = mysqli_query($conn, $sql);

?>

<div class="container">
  <div class="col-md-offset-1">
   <div class="col-md-8">
     <form action="order.php" method="post">
       <input class="from-control" type="text" autocomplete="off"
       placeholder="ค้นหา  ลูกค้า, สินค้า ...." name="search_all" id="search-all">
       </input>
     </form>
  </div>
   <div class="col-md-2">
     <select id="search_all" class="from-control">
       <option value="all">ค้นหาทั้งหมด</option>
       <option value="customer">ออเดอร์</option>
       <option value="cusid">- รหัสออเดอร์</option>
       <option value="cusname">- ชื่อลูกค้า</option>
       <option value="contname">- Tag</option>
       <option value="proname">สินค้า</option>
     </select>
    </div> 
  </div>
</div>

<div class="container">
 <div class="row">
    <div style="font-size:28px">    จัดการออเดอร์    <a href="insertOrderfrom.php" class="btn btn-success" role="basic"> สร้าง Order + </a></div>
 <br>
  <!-- <div class="col-md-3">
  <div class="search-container">
    <br>
    <table style="width: 500px;">
      <tr>
         <th></th>
         <th></th>
         <th></th>
         <th></th>
      </tr>
      <?php
          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

      ?>
      <tr>
         <td><?php echo ++$n ?> </td>
         <td><?php echo $row['cusname']; ?></td>
         <td><?php echo $row['contname']; ?></td>
         <td><?php echo $row['proname']; ?></td>
      </tr>
      <?php 
          }
      ?>
    </table>
  </div>
  </div>    -->
  </div>




   <div class="row">
   <div class="col-md-4 col-md-offset-2">  
    <div class="form-group">
      <h4 for="inputdefault" style="font-size: 24px;">ยอดขายวันนี้</h4>
      <h4 class="text-primary semi-bold">0.00 ฿</h4>
    </div> 
    </div>

    <div class="col-sm-4">
    <div class="form-group">
      <h4 for="inputdefault" style="font-size: 24px;">ยอดขายเดือนนี้</h4>
      <h4 class="text-primary semi-bold">0.00 ฿</h4>
    </div>
   </div>

   </div>
</div>


</body>
</html>
