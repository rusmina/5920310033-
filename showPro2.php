<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<link rel="icon" href="images/loco-icon.ico">
</head>
<style>
  table {
    border-collapse: collapse;
    width: 100%;
}

  th, td {
    text-align: left;
    padding: 8px;
	height: 40px;
}

  tr:nth-child(even){background-color: #f2f2f2}

  th {
    background-color: grey;
    color: white;
}
  table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}
</style>

<body>

<?php
include "dbconnect.php";
date_default_timezone_set("Asia/Bangkok");
//constant value of genders
// $genders= array();
// $genders[0]="ไม่ระบุ"; $genders[1]="ชาย"; $genders[2]="หญิง";
// function getAge($dte) { //the function used for computing age, based on the birthdate
// 		return intval(date('Y', time() - strtotime($dte))) - 1970;
// }
// function shwThaiDate($dte) { //where $dte is a Date format
// 	return date("d-m-Y",strtotime($dte));//formulate date format for displaying
// }

//count all patients from database order by name, this is used for caculate the numbers of pages
	$sql = "SELECT count(*) np FROM product";
	$result = $conn->query($sql);
	$rw = $result->fetch_assoc(); 
	$numfound = $rw['np']; //return the number of records
	
	if($_POST['showPage'] || $_POST['nextPage'] ||$_POST['firstPage'] || $_POST['lastPage'] || $_POST['prePage']){
		$p_size =  $_POST['nrec']; //กำหนดจำนวน record ที่จะแสดงผลต่อ 1 เพจ ให้เท่ากับค่าที่จำนวนต่อเพจที่รับมา
	}else{
		$p_size = 10; //กำหนดจำนวน record เริ่มต้นที่จะแสดงผลต่อ 1 เพจ
	}
	$total_page=(int)($numfound/$p_size); 
	//ทำการหารหาจำนวนหน้าทั้งหมดของข้อมูล ในที่นี้ให้หารออกมาเป็นเลขจำนวนเต็ม 
	if(($numfound % $p_size)!=0){ //ถ้าข้อมูลมีเศษให้ทำการบวกเพิ่มจำนวนหน้าอีก 1 
	   $total_page++;
	}
	if($_POST[showPage]){
	/*
	หากมีการส่งค่ามาเพื่อเลือกดูหน้าข้อมูลหน้าใดให้ทำการคำนวน โดยใช้ จำนวนข้อมูลที่ต้องการแสดงต่อ 1 เพจ คูณกับ หน้าข้อมูลที่ต้องการเลือกชม ลบด้วย 1
	*/ 
		$page=$_POST['pageno'];
		$start=$p_size*($page-1);

	}else if($_POST['nextPage']){
		$p = $_POST['pageno'];
		if ( $p < $total_page)
			$page=$p + 1;
		else $page=$p;
		$start=$p_size*($page-1);

	}else if($_POST['firstPage']){
		$page=1;
		$start=$p_size*($page-1);

	}else if($_POST['lastPage']){
		$page=$total_page;
		$start=$p_size*($page-1);
	}else if($_POST['prePage']){
		$p= $_POST['pageno'];
		if($p >= 2)
			$page = $p - 1;
		else $page = $p;
		$start = $p_size*($page-1);
	}else{
	/*
	ถ้่ายังไม่มีการส่งค่ามาเพื่อทำการเลือกดูหน้าข้อมูลใด ๆ ให้กำหนดเป็นหน้าแรกของข้อมูลเป็นค่า Default และให้ Record แรกเริ่มที่ Record ที่ 0 หรือ Record แรก
	*/ 
	   $page=1;
		 $start=0;
		 
    function shwThaiDate($dte) { //where $dte is a Date format
		return date("d-m-Y",strtotime($dte));//formulate date format for displaying
	  }
	}
	
//new sql for selecting all patients details
$sql = "SELECT *
			FROM product
			ORDER BY proid LIMIT $start , $p_size";
			
$result = $conn->query($sql);

?>
<div class="container">
<div class="panel panel-default">
 <div class="panel-body"> 
 <div class="row-fluid">
  <div class="table-responsive">
  <table clsss="table- table-hover" >
   <thrad>
     <h2><center>ข้อมูลสินค้า</center></h2>
      <table>
      <tr>
			 <th>รูปภาพ</th>
       <th><center>ลำดับที่</center></th>
       <th>ชื่อสินค้า</th>
       <th>ราคาสินค้า</th>
       <th>ราคาต้นทุน</th>
       <th>จำนวนสินค้าในสต๊อก</th>
			 <th>ราคาขายส่ง</th>
			 <th>วันที่สต๊อกสินค้า</th>
			 <th>จำนวนสินค้าเริ่มต้น</th>
       <th colspan=2>ดำเนินการ</th>
      </tr>

<?php
	include "dbconnect.php";
	$sql = "SELECT * FROM product ORDER BY proid";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	//loop to show the details of each record

	$n=0;
    while($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td>".$row["pro_image"]."</td>";
		echo "<td><center>".++$n."</center></td>";
		echo "<td>".$row["proname"]."</td>";
		echo "<td>".$row["proprice"]."</td>"; //convert gender id to string
        echo "<td>".$row["procost"]."</td>";
		echo "<td>".$row["prostock"]."</td>";
		echo "<td>".$row["prosale"]."</td>";
		echo "<td>".shwThaiDate($row["stockDate"])."</td>";
		echo "<td>".$row["stockNum"]."</td>";
		echo "<td>";
		echo "<form action = '#' method ='post'> ";
		echo "<input type='hidden' name ='proid'  value = '".$row["proid"]."'/>";		
		echo "<input name = 'proname' type='submit' value='edit' />";
		echo "</form>";
		echo "</td>";
		echo "<td>";
		echo "<form action = '#' method ='post'> ";
		echo "<input type='hidden' name ='proprice'  value = '".$row["proprice"]."'/>";
		echo "<input name = 'delCust' type='submit' value='del' />";
		echo "</form>";
		echo "</td>";
		echo "</tr>";	
    }
	echo "<tr><th colspan='11'>Total ".$n." records </th></tr>";
} else {
    echo "0 results";
}
//show navigation bar
echo "<tr><td colspan='13'><center>";
	echo"<form action = 'showPro.php' method ='post'> ";
	echo "<input type='hidden' name ='proid'  value = '$proid'/>";		
	echo "<input type='hidden' name ='proname'  value = '$proname'/>";		
	echo "<input type='hidden' name ='proprice' value = '$proprice'/>";
    echo "<input type='hidden' name ='procost' value = '$procost'/>";
    echo "<input type='hidden' name ='prostock' value = '$prostock'/>";
	echo "แสดงหน้าที่ : <select name = pageno value =$page>";

		for($i=1;$i<=$total_page;$i++){ //สร้าง list เพื่อให้ผู้ใช้งานเลือกชมหน้าข้อมูล
			echo "<option ";
			 if($page==$i)
				     echo "selected='selected'";
			echo "value=",$i, ">",$i;
		}
	
	echo "</select>  จากทั้งหมด ".$total_page." หน้า";
	echo " จำนวนรายการต่อหน้า <input name = 'nrec' type='text' value = $p_size size = 3/>";
	echo "<input name = 'showPage' type='submit' value='show' />";
	echo "<input name = 'firstPage' type='submit' value='<<first' />";
	echo "<input name = 'prePage' type='submit' value='<previous' />";
	echo "<input name = 'nextPage' type='submit' value='next>' />";
	echo "<input name = 'lastPage' type='submit' value='last>>' />";
	echo "</form>";
echo "</td></tr>";
//end navigation bar	

// echo "<tr><td colspan='11'><a href='insertPatientForm.php'>Add New Patient</a></td></tr>";
$conn->close();

?>


  </table>
  </div>
</div>
</div>
</div>
</div>

</body>
</html>
