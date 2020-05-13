<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<meta name="format-detection" content="telephone=no">
	<link rel="icon" href="loco-icon.png">
	<form action="operations.php" method="post" enctype="multipart/form-data">
	<link rel="stylesheet" href="style.css"> 
</head>
<style>
    table {
       border-collapse: collapse;
       width: 100%;
    }

    th, td {
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

	$sql = "SELECT count(*) np FROM product";
	$result = $conn->query($sql);
	$rw = $result->fetch_assoc(); 
	$numfound = $rw['np']; //return the number of records
	
    function shwThaiDate($dte) { //where $dte is a Date format
		return date("d-m-Y",strtotime($dte));//formulate date format for displaying
	  }
	
	// if(isset($_GET['id'])) {
	// 	mysql_query("DELETE FROM product WHERE proid = ".$_GET['id']);
	// }
    // if(isset($_GET['id'])) {
	// 	mysql_query("UPDATE FROM product WHERE proid = ".$_GET['id']);
	// }

?>

<br><br>

<div class="container">
  <div class="txt-heading" style="font-size: 28px"><center> รายการสินค้า </center></div>
      <a href="product.php?action=empty" id="btnEmpty"> ย้อนกลับ </a>
	  <a href='insertPro.php' id="btnEmpty">เพิ่มสินค้าใหม่ + </a>
	  <br><br>
      <table class="tbl-cart" cellpadding="10" cellspacing="1">
        <tbody>
		   <?php
	          $sql = "SELECT * FROM product ORDER BY proid";
	          $result = $conn->query($sql);
            	if ($result->num_rows > 0) {
				$n=0;
		   ?>
		   
          <tr style="font-size: 16px;">
		     <th style="text-align: center;" width="5%">#</th>
             <th style="text-align: left;">รูปภาพ</th>
             <th style="text-align: left;">ชื่อสินค้า</th>
             <th style="text-align: right;" width="10%">ราคาสินค้า</th>
             <th style="text-align: right;" width="10%">ราคาต้นทุน</th>
			 <th style="text-align: right;" width="10%">ราคาขายส่ง</th>
			 <th style="text-align: right;" width="10%">วันที่สต๊อกสินค้า</th>
			 <th style="text-align: right;" width="11%">จำนวนสินค้าในสต๊อก</th>
             <th style="text-align: center;" width="5%">Edit</th>
			 <th style="text-align: center;" width="5%">Delete</th>
		  </tr>

		  <?php
		       while($row = $result->fetch_assoc()) {
		  ?>

          <tr>
		     <td style="text-align: center;"><?php echo ++$n ?></td>
             <td><img src="<?php echo $row['pro_image']; ?>" class="cart-item-image" alt=""></td>
             <td style="text-align: left;"><?php echo $row['proname']; ?></td>
             <td style="text-align: right;"><?php echo number_format ($row['proprice'],2); ?></td>
			 <td style="text-align: right;"><?php echo $row['procost']; ?> ฿</td>
			 <td style="text-align: right;"><?php echo $row['prosale']; ?> ฿</td>
			 <td style="text-align: right;"><?php echo shwThaiDate($row['stockDate']); ?></td>
			 <td style="text-align: center;"><?php echo $row['prostock']; ?></td>
             <td style="text-align: center;"><a href="editPro.php?proid=<?php echo $row['proid']; ?>" class="btnRemoveaction"><i style='font-size:24px;color:blue' class='fas'>&#xf0ad;</i>
               </td>
			<td style="text-align: center;"><a  href="deletePro.php?proid=<?php echo $row['proid']; ?>" class="btnRemoveaction"><i style='font-size:24px;color:red' class='fas'>&#xf1f8;</i>
               </td>
		  </tr>
		  
          <?php
		        }   	
          } else {
            echo "0 results";
            }
		  ?>
		  
          <tr>
			 <th colspan="2" style="text-align: left;font-size: 18px" width="5%">  Total : <?php echo $n ?></th>
			 <th></th>
             <th></th>
			 <th></th>
			 <th></th>
			 <th></th>
			 <th></th>
			 <th></th>
			 <th></th>
          </tr> 
		</tbody>

		<?php
            $conn->close();
		?>
		
	  </table>
	</div>
	</div>
</body>
</html>
