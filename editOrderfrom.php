<!DOCTYPE html>
<html>
<head>
<title>แก้ไขออเดอร์</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
	
</style>
</head>
<body>
<?php
	//add menu on the top of this insert form
	include "menu.php";
	//เชื่อมต่อฐานข้อมูลและ select ข้อมูลผู้ป่วยจากตาราง customer ตาม cusid ที่ส่งมาจากฟอร์ม
	include "dbconnect.php"; //connect the database, this returns a connection ชื่อ $conn
	// $id = $_GET["id"]; //get id from login user, in case of editing data themselves
	// if($id != $row["cusid"]"")
	// 	$cusid = $id;
	// else 
		// $cusid =$_GET['cusid']; //get ptid from showPatients, in case of admin/staff used
  // $cusid = mysqli_real_escape_string($conn,$_GET['cusid']);
	// $sql = "SELECT * FROM customer WHERE cusid = '$cusid'"; //คำสั่ง select 
	// $result = $conn->query($sql); //run คำสั่งคิวรีย์ โดยนำผลที่ได้มาเก็บในตัวแปร $result ซึ่งเป็นก้อนข้อมูลทั้งหมดที่ได้มาจากการรัน
	// $row = $result->fetch_assoc(); //อ่านรายการข้อมูลจาก result มาเก็บในตัวแปร $row เพราะฉะนั้น $row นี้ก็จะเป็นรายการ (record) ที่มีรหัสตรงกับที่ระบุ
?>

<form action="operations.php" method="post" enctype="multipart/form-data">

<div class="container">
 <div class="panel panel-default">
 <div class="panel-body">
  <div class="col-sm-6"> 
    <div class="form-group">
      <label for="inputdefault">รหัสออเดอร์</label>
      <input class="form-control" id="inputdefaul" type="int" name="cusid">
      
   </div>
   <div class="form-group">
      <label for="inputdefault">ชื่อ-สกุล</label>
      <input class="form-control" id="inputdefault" name="cusname" type="text" value="<?php echo $row["cusname"] ?>">
    </div>
    <div class="form-group">
      <label for="comment">ที่อยู่ :</label>
      <textarea class="form-control" rows="8" id="comment" name="cusadd" value="<?php echo $row["cusadd"] ?>"></textarea>
    </div>
</div>

  <div class="col-sm-6">
    <div class="form-group">
      <label for="inputsm">เบอร์โทรศัพท์</label>
      <input class="form-control input-sm" id="inputsm" name="custel" type="text" value="<?php echo $row["custel"] ?>">
    </div>

   <tr><th colspan="2"><input type="submit" name="updateOrder" value="บันทึกการแก้ไข"></th></tr>
</table>
</form> 

    <!-- <div class="form-group">
      <label for="inputdefault" class="fa fa-tags">Tag</label>
      <input class="form-control" id="inputdefault" name="contname" type="text" placeholder="(เช่น ชื่่อที่ใช้ใน facebook Instragram และ line)">
     </div>
     <div class="form-group">
      <label for="sel1">ช่องทางการติดต่อ</label>
      <select class="form-control" id="sel1" name="contchanme" >
        <option>-</option>
        <option>Facebook</option>
        <option>Instragram</option>
        <option>Line</option>
      </select>
     </div>
    </div>
  </div>
</div>
  
  <div class="col-sm-4">
     <div class="form-group">
      <label for="inputsm">วันที่สั่งชื้อสินค้า</label>
      <input class="form-control input-sm" id="inputdefault" name="orderDate" type="date">
     </div>
     <div class="form-group">
      <label for="sel1">ช่องทางการจัดส่งสินค้า</label>
      <select class="form-control" id="sel1" name="Shipping">
        <option>-</option>
        <option>ไปรษณีย์</option>
        <option>Kerry</option>
      </select>
     </div>
     <div class="form-group">
      <label for="inputdefault">ค่าส่ง</label>
      <input class="form-control" id="inputdefault" name="dCost" type="text" placeholder="ค่าส่งที่เรียกเก็บจากลูกค้า (฿)">
    </div>
    <div class="form-group">
      <label for="inputdefault">ค่าส่งสินค้า</label>
      <input class="form-control" id="inputdefault" name="Delivery" type="text" placeholder="ค่าส่งรวม (฿)">
    </div>
  </div>

  <div class="col-sm-4">
    <div class="form-group">
      <label for="inputdefault">วันที่โอนเงิน</label>
      <input class="form-control" id="inputdefault" name="PaymentMethods" type="date">
    </div>
    <div class="form-group">
      <label for="sel1">ช่องทางการโอนเงิน</label>
      <select class="form-control" id="sel1" name="PaymentDate" >
        <option>-</option>
        <option>SCB</option>
        <option>กรุงไทย</option>
        <option>กสิกร</option>
        <option>ออมสิน</option>
      </select>
    </div>
    <div class="form-group">
      <label for="inputsm">วันที่จัดส่งสินค้า</label>
      <input class="form-control input-sm" id="inputsm" name="ProductDeliveryDate" type="text">
    </div>
    <div class="form-group">
      <label for="inputsm">เลขพัสดุ</label>
      <input class="form-control input-sm" id="inputsm" name="PackageNum" type="text">
    </div>
    <div class="form-group">
      <label for="sel1">สถานะการสั่งชื้อ</label>
      <select class="form-control" id="sel1" name="cstatus">
        <option>-</option>
        <option>แจ้งโอนเงิน</option>
        <option>ที่ต้องจัดส่่ง</option>
        <option>สำเร็จ</option>
      </select>
     </div>
    </div>
  </div> -->

<!-- this enctype="multipart/form-data" is necessary for uploading file -->
<!-- <form action="#" method="post" enctype="multipart/form-data">
<table>

<td>
	<?php
		// $sql = "SELECT natid FROM nationalities ORDER BY nation_thai";
		// $result = $conn->query($sql);
		// echo "<select name='natid'>";
		// while($rw = $result->fetch_assoc()){
		// 	echo "<option value=".$rw['natid'];
		// 	if($rw['natid']==$row['natid']) echo " selected ";
		// 	echo ">".$rw['nation_thai']."</option>";
		// }
		// echo"</select>";
	?>
</td></tr>

<?php 
	//this for sending parameter to operations.php for updating by Post method
	echo "<input type='hidden' name ='cusid'  value = '$cusid'/>";	
?>

<tr><th colspan="2"><input type="submit" name="updateOrder" value="บันทึกการแก้ไข"></th></tr>
</table>
</form> -->
<br>
<!-- <a href="editOrderfrom.php">แก้ไขรายการออเดอร์</a> -->

</body>
</html>
