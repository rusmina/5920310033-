
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
  <link rel="icon" href="loco-icon.png">
</head>
</head>

<style>

</style>
</head>

<body style="background-color:#ECECEC">

<?php
    include "menu.php";
    include "dbconnect.php";
    $sql = "SELECT count(*) as np FROM customer WHERE cusid LIKE '%"."%'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $n = $row['np']; 
    $hno = "C".($n+1);
    $conn->close();
?>
<!-- <this enctype="multipart/form-data" is necessary for uploading file> -->
<form action="operations.php" method="post" enctype="multipart/form-data">

<div class="container">
 <div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;background-color: #778899"><h1 style="color: white;font-size: 18px !important">สร้างรายการใหม่</h1></div>
 
  
  <div class="panel-body" style="background-color: #F8F8FF";> 
   <div class="col-md-4 col-md-offset-2">  
    <div class="form-group">
      <label for="inputdefault">รหัสลูกค้า</label>
      <input class="form-control" id="inputdefaul" type="int" name="cusid" value='<?php echo $hno; ?>'>
    </div> 
    <div class="form-group">
      <label for="inputdefault">ชื่อ-สกุล</label>
      <input class="form-control" id="inputdefault" name="cusname" type="text">
    </div>
    <div class="form-group">
      <label for="comment">ที่อยู่ :</label>
      <textarea class="form-control" rows="5" id="comment" name="cusadd"></textarea>
    </div>
   </div>

   <div class="col-sm-4">
    <div class="form-group">
      <label for="inputsm">เบอร์โทรศัพท์</label>
      <input class="form-control input-sm" id="inputsm" name="custel" type="text">
    </div>

    <div class="form-group">
      <label for="inputdefault" class="fa fa-tags">Tag</label>
      <input class="form-control" id="inputdefault" name="contname" type="text" placeholder="(เช่น ชื่่อที่ใช้ใน facebook Instragram และ line)">
    </div>

    <div class="form-group">
      <label for="sel1">ช่องทางการติดต่อ</label>
      <select class="form-control" id="sel1" name="contchanme">
        <option>-</option>
        <option>Facebook</option>
        <option>Instragram</option>
        <option>Line</option>
      </select>
    </div>
   </div>

    <div class="col-sm-4">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"> เลือกสินค้า + </button>
      <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      <?php 
         include "showPro.php"
      ?>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Coppy</button> -->
        </div>
      </div>
      </div>
    </div>
  </div>
 
 


<div class="panel panel-default">
 <div class="panel-body" style="background-color: #F8F8FF"> 
  <div class="col-md-4 col-md-offset-2">
     <div class="form-group">
      <label for="inputsm">วันที่สั่งชื้อสินค้า</label>
      <input class="form-control input-sm" id="inputdefault" name="oDate" type="date">
     </div>
     <div class="form-group">
      <label for="sel1">ช่องทางการจัดส่งสินค้า</label>
      <select class="form-control" id="sel1" name="oship">
        <option>-</option>
        <option>ไปรษณีย์</option>
        <option>Kerry</option>
      </select>
     </div>
     <div class="form-group">
      <label for="inputdefault">ค่าส่ง</label>
      <input class="form-control" id="inputdefault" name="dC" type="text" placeholder="ค่าส่งที่เรียกเก็บจากลูกค้า (฿)">
    </div>
    <div class="form-group">
      <label for="inputdefault">ค่าส่งสินค้า</label>
      <input class="form-control" id="inputdefault" name="deR" type="text" placeholder="ค่าส่งรวม (฿)">
    </div>
  </div>

  <div class="panel-body"> 
  <div class="col-sm-4">
    <div class="form-group">
      <label for="inputdefault">วันที่โอนเงิน</label>
      <input class="form-control" id="inputdefault" name="pDate" type="date">
    </div>
    <div class="form-group">
      <label for="sel1">ช่องทางการโอนเงิน</label>
      <select class="form-control" id="sel1" name="pMetho" >
        <option>-</option>
        <option>SCB</option>
        <option>กรุงไทย</option>
        <option>กสิกร</option>
        <option>ออมสิน</option>
      </select>
    </div>
    <div class="form-group">
      <label for="inputsm">วันที่จัดส่งสินค้า</label>
      <input class="form-control input-sm" id="inputsm" name="pMdate" type="date">
    </div>
    <div0 class="form-group">
      <label for="inputsm">เลขพัสดุ</label>
      <input class="form-control input-sm" id="inputsm" name="pNum" type="text">
    </div>

     </div>
    </div>
  </div>
</div>
</div>
<center>
<tr><td colspan=2><input type="submit" name="insOrder" class="btn btn-success" value="บันทึกรายการ"></td></tr>
<tr><td colspan=2><a href="order.php" class="btn btn-success" role="basic"> ยกเลิกรายการ </a></td></tr>
   <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">แสดงรายการ</button>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">รายการออเดอร์</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Coppy</button>
        </div>
      </div>
       -->
    </div>
  </div> 
</center>
<br><br>
</div>
</div>
</form>

</body>
</html>




