<!doctype html>

<html>
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
	
	// $sql = "SELECT count(*) np FROM customer";
	// $result = $conn->query($sql);
	// $rw = $result->fetch_assoc(); 
	// $numfound = $rw['np']; //return the number of records
	
	
	function shwThaiDate($dte) { //where $dte is a Date format
		return date("d-m-Y",strtotime($dte));//formulate date format for displaying
	}
	 
    // $sql = "SELECT *
	// 		FROM customer
	// 		ORDER BY cusid LIMIT $start , $p_size";
 			
    // $result = $conn->query($sql);

?>
<br><br>

<div class="container" style="background-color:  white ;">
  <div class="txt-heading" style="font-size: 28px"><center> รายการออเดอร์ที่เคยสร้าง </center></div>
      <a href="showAll.php?action=empty" id="btnEmpty"> ย้อนกลับ </a>
	  <a href='insertOrderfrom.php' id="btnEmpty">สร้างออเดอร์ใหม่ + </a>
	  <br><br>
      <table class="tbl-cart" cellpadding="10" cellspacing="1">
	  <tbody>
	  <?php 
			// $sql = "SELECT * FROM customer ORDER BY cusid";
			// $sql = "SELECT * FROM social ORDER BY contid";
			// $sql = "SELECT * FROM ord ORDER BY rid";
			// $result = $conn->query($sql);
			//   if ($result->num_rows > 0) {
			//   $n=0;

			

			$sql = "SELECT * FROM customer INNER JOIN social ON customer.cusid = social.cusid";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			$n=0;
	  ?>

	       <tr style="font-size: 16px;">
		     <th style="text-align: center;" width="5%">#</th>
			 <th style="text-align: center;" width="5%">ID</th>
             <th style="text-align: left;">ชื่อ-สกุล</th>
			 <th style="text-align: left;">ที่อยู่</th>
			 <th style="text-align: left;" width="10%">Tag</th>
             <th style="text-align: left;" width="15%">ช่องทางการติดต่อ</th>
             <th style="text-align: left;" width="5%">Tel</th>
			 <th style="text-align: right;" width="5%">Edit</th>
			 <th style="text-align: right;" width="5%">Delete</th>
			 <th></th>
		  </tr> 
		       

	  <?php
		       while($row = $result->fetch_assoc()) {
		  ?>

          <tr>
		     <td style="text-align: center;"><?php echo ++$n ?></td>
             <td style="text-align: center;" width="5%"><?php echo $row['cusid']; ?></td>
             <td style="text-align: left;"><?php echo $row['cusname']; ?></td>
			 <td style="text-align: left;"><?php echo $row['cusadd']; ?></td>
             <td style="text-align: left;" width="10%"><?php echo $row['contname']; ?></td>
			 <td style="text-align: left;" width="15%"><?php echo $row['contchanme']; ?></td>
             <td style="text-align: left;" width="5%"><?php echo $row['custel']; ?></td>
             <td style="text-align: center;"><a href="#?cusid=<?php echo $row['cusid']; ?>" class="btnRemoveaction"><i style='font-size:24px;color:blue' class='fas'>&#xf0ad;</i>
               </td>
			<td style="text-align: center;"><a  href="deleteOrder.php?cusid=<?php echo $row['cusid']; ?>" class="btnRemoveaction"><i style='font-size:24px;color:red' class='fas'>&#xf1f8;</i>
               </td>

			<td>
			   
			   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">แสดงรายการ</button>
			     <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog">
    
                   <!-- Modal content-->
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 class="modal-title"><center> รายการออเดอร์ </center></h4>
                     </div>

                     <div class="modal-body">
                         <from action="index.php?action=add&code">
                         <div class="product-title-footer">
						    <p> ชื่อสินค้า : </p>
						    <p> วันที่สั่งชื้อสินค้า      :<?php echo $row['oDate']; ?> </p>
                            <p> ช่องทางการจัดส่งสินค้า : <?php echo $row['oship']; ?> </p>
                            <p class="price"> ค่าส่ง (ทีเรียกเก็บจากลูกค้า) <?php echo $row['dC']; ?>  ฿ </p>
							<p  class="price"> ค่าส่งสินค้า <?php echo $row['deR']; ?>  ฿ </p>
                            <p> วันที่โอนเงิน <?php echo $row['pDate']; ?> </p> 
							<p> ช่องทางการโอนเงิน <?php echo $row['pMetho']; ?>  </p>
							
                         <div class="cart-action">
                         </div>
                         </div>
                         </from>
                        
					 </div>

                     <div class="modal-footer">
                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                       <button type="button" class="btn btn-default" data-dismiss="modal">Coppy</button>
                     </div>
                 </div>
				 </div>
				 </div>

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
</div>
</div>
</div>
</div>
</body>
</html>