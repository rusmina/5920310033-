
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
.table-responsive {
    min-height: .01%;
    overflow-x: auto;
}
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}
table {
    background-color: transparent;
}
table {
    display: table;
}
thead {
    display: table-header-group;
    vertical-align: middle;
    border-color: inherit;
}
tr {
    display: table-row;
    vertical-align: inherit;
    border-color: inherit;
}
.table>thead>tr>th {
    border-bottom: 0px;
}
div {
    display: block;
}
table {
    border-spacing: 0;
    border-collapse: collapse;
}
</style>
</head>

<body style="background-color:#ECECEC">

<?php
    include "menu.php";
    include "dbconnect.php";
    $sql = "SELECT count(*) as np FROM product WHERE proid LIKE '%"."%'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $n = $row['np']; 
    $hno = "P".($n+1);
    $conn->close();

    $inssup = $_POST['inssup'];
    $s = '%'.$inssup.'%';
    $sql = "SELECT * FROM supp	WHERE spn LIKE '$s'";	
    $result = mysqli_query($conn, $sql);

    if(isset($_GET['id'])){
      $sql = "SELECT * FROM product WHERE proid = ".$_GET['id'];
      $result = mysql_query($aql);
      $data = myaql_fetch_assoc($result);
    }

?>



<!-- this enctype="multipart/form-data" is necessary for uploading file -->
<form action="operations.php" method="post" enctype="multipart/form-data">

<div class="container">
 <div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;background-color: #778899">
    <h1 style="color: white;font-size: 18px !important">เพิ่มสินค้า</h1></div>
 
 <div class="panel-body" style="background-color: #F8F8FF">
  <div class="col-md-3 col-md-offset-1">
    <div class="form-group">
      <label for="inputdefault">รหัสสินค้า</label>
      <input class="form-control" id="inputdefaul" type="int" name="proid" value="<?php echo $hno; ?>">
    </div>
    <div class="form-group">
      <label for="inputdefault">ชื่อสินค้า</label>
      <input class="form-control" id="inputdefault" name="proname" type="text">
    </div>
   <!-- <div class="form-group">
      <label for="sel1">หมวดหมู่  <a href="insertCat.php" class="btn btn-success" role="button"> เพิ่มหมวดสินค้า + </a></label>
      <select class="form-control" id="sel1" name="contchanme">
        <option>-</option>
     
      </select>
     </div> -->
  </div>

  <div class="col-sm-3">
    <div class="form-group">
      <label for="inputsm">ราคาสินค้า</label>
      <input class="form-control input-sm" id="inputsm" name="proprice" type="text"placeholder="ราคาขายต่อชิ้น (฿)">
    </div>

    <div class="form-group">
      <label for="inputdefault">ต้นทุนสินค้า</label>
      <input class="form-control" id="inputdefault" name="procost" type="int" placeholder="ราคาต่อชิ้น (฿)">
     </div>

     <div class="form-group">
      <label for="inputsm">จำนวณสินค้า</label>
      <input  class="form-control input-sm"  type="number" value="0 "id="inputsm" name="prostock" type="text" placeholder="จำนวนสินค้าที่สต้อก">
    </div>
    
  </div>


   <div class="col-sm-3"> 
    <!-- <div class="form-group">
      <label for="inputdefault">น้ำหนักสินค้า</label>
      <input class="form-control" id="inputdefaul" type="int" name="weight">
   </div> -->
   <div class="form-group">
      <label for="inputdefault">ราคาขายส่ง</label>
      <input class="form-control" id="inputdefault" name="prosale" type="text" placeholder="ราคาต่อชิ้น (฿)">
    </div>
   
    <div class="form-group">
      <label for="inputsm">วันที่สต๊อกสินค้า</label>
      <input class="form-control input-sm" id="inputdefault" name="stockDate" type="date">
     </div>

      <div class="form-group">
      <label for="inputsm">จำนวณสินค้าเริ่มต้น</label>
      <input  class="form-control input-sm"  type="number" value="0 "id="inputsm" type="text" name="stockNum" placeholder="จำนวนสินค้าที่สต้อกเข้ามา">
    </div>
  </div>

</div> 


<div class="panel-body" style="background-color: #F8F8FF">
 <div class="col-md-3 col-md-offset-1">
    <div class="form-group">
      <label for="inputsm">Product image to Upload : </label>
    <div class="card">
      <div class="card-body">
      <input type="file" name="pro_image" id="fileToUpload"></td></tr>
    </div>
    </div>
  </div>
 </div>
 
  <!-- <div class="col-sm-5">
    <div class="row" style="background-color: white" >
    <div class="fields">
    <div class="table-responsive">
     <table class="table mytable">
      <thead>
        <tr>
          <th>#</th>
          <th>ชื่อสินค้า</th>
          <th>สต๊อก</th>
          <th></th>
        </tr>
      </thead>
      <thody id="product-subproducts">
        <tr class="nested-fields">
          <td></td>
          <td>
             <input class="form-control" required="required" type="text" name="ssid" id="">
          </td>
          <td>
             <input class="form-control" required="required" type="text" name="spn">
          </td>
          <td>
             <input class="form-control" required="required" type="number" value="0" name="snm">
          </td>
          <td>
             <input type="hidden" name="delsup" id=" " value="false">
             <a class="from-button btn btn-danger removebtn btn-xs remove_fields dynamic" href="#">ลบ</a>
          </td>
        </tr>
      </thody>
    </table>
    <button data-association-insertion-node="thody#product-supproducts" data-association-insertion-method="append"
       class=" btn btn-info add_fields"  data-association="subproduct"  data-associations="subproducts" 
       data-association-insertion-template=" " name="inssup" href="#">เพิ่มสินค้าย่อย</button>
   </div>
  </div> -->

  
</div>
</div>
</div>
</div>
</div>
</div>

<!-- insertPr -->
<br>
<center>
<tr><td colspan=2><input type="submit" name="insPro" class="btn btn-success" value="เพิ่มรายการ"></td></tr>
<tr><td colspan=2><a href="product.php" class="btn btn-success" role="basic"> ยกเลิกรายการ </a></td></tr>

<!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">แสดงรายการ</button>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <! Modal content-
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">รายการออเดอร์</h4>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Coppy</button>
        </div>
      </div>
      
    </div>
  </div> -->
   
</center>
<br><br>
</div>
</div>
</from>

</body>
</html>




