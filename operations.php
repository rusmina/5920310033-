<?php
	//including file connection
    include "dbconnect.php"; //return connection $conn
	//include "menu.php"; //including menu

    if(isset($_POST['insOrder']))  {//in case of insertion
        $cusid	               =$_POST['cusid'];
        $cusname	           =$_POST['cusname'];
		$cusadd	               =$_POST['cusadd'];	
		$custel                =$_POST['custel'];	
		// $contid                =$_POST['contid']; //social
		$contname	           =$_POST['contname'];
		$contchanme	           =$_POST['contchanme'];
		// $orderid             	=$_POST['orderid']; //order
		$rid	               =$_POST['rid'];
		$oDate	               =$_POST['oDate'];
		$oship	               =$_POST['oship'];
		$dC	                   =$_POST['dC'];
		$deR                   =$_POST['deR'];
		$pDate	               =$_POST['pDate'];
		$pNum	               =$_POST['pNum'];
		$ptus                  =$_POST['ptus'];
		$pMetho                =$_POST['pMetho'];
		$pMdate                =$_POST['pMdate'];
    
            	//the order of such field must be matched the order of each field in the database
		$sql1 = "INSERT INTO customer (cusid, cusname, cusadd, custel) 
								VALUES 	 ('$cusid', '$cusname', '$cusadd', '$custel')";
		$rs1 = mysqli_query($conn,$sql1);

		$sql2 = "INSERT INTO social (contid, contname, contchanme) 
								VALUES 	 ('$contid', '$contname', '$contchanme')";
		$rs2 = mysqli_query($conn,$sql2);
		

		$sql3 = "INSERT INTO ord (rid, oDate, oship, dC, deR, pDate, pNum, ptus, pMetho, pMdate) 
		                       VALUES 	 ('$rid', '$oDate', '$oship', '$dC', '$deR', '$pDate', '$pNum', '$ptus', '$pMetho', '$pMdate')";					

		$rs3 = mysqli_query($conn,$sql3);
		mysqli_close($conn);

		echo "<script>
						alert('บันทึกรายการ');
						window.location.href='showOrder.php';
			 </script>";
	
	// }else if(isset($_POST['updateOrder'])){ //in case of update

	// 	$cusid		=$_POST['cusid'];
    //     $cusname	=$_POST['cusname'];
	// 	$cusadd		=$_POST['cusadd'];
	// 	$custel		=$_POST['custel'];
		

	// 	//incase of updating normally without updating pic
	// 		$sql = "UPDATE customer SET cusname='$cusname', cusadd='$cusadd',custel ='$custel' WHERE cusid='$cusid'";
	
	// 	if ($conn->query($sql) === TRUE) {
	// 		//"Record updated successfully" and redirect to the menu
	// 		// session_start();//start session
	// 		// $id = $_SESSION['valid_id'];	
	// 		// $utype = $_SESSION['valid_utype'];
	
	// 		// if($utype==1) //staff/admin
	// 			echo "<script>
	// 						alert('Updated successful JA');
	// 						window.location.href='show.php';
	// 				</script>";
	// 		// else if($utype==3) //if patient
	// 		// 	echo "<script>
	// 		// 			alert('Updated successful JA');
	// 		// 			window.location.href='menu.php';
	// 		// 		</script>";
	// 	} else {
	// 		echo "Error updating record: " . $conn->error;
	// 	}
	}
	
?>	    	
	

<?php
	include "dbconnect.php";
    if(isset($_POST['insPro'])) {
		$proid             	=$_POST['proid']; //product
	    $proname	        =$_POST['proname'];
        $protype	        =$_POST['protype'];
		$proprice	        =$_POST['proprice'];	
		$procost            =$_POST['procost'];	
		$prostock           =$_POST['prostock'];
		// $weight	            =$_POST['weight'];	
		$prosale            =$_POST['prosale'];
        $stockDate	        =$_POST['stockDate'];
		$stockNum           =$_POST['stockNum'];	
		// $pro_image       =$_POST['pro_image'];
		

	    //Upload images ===========================================================================
		$target_dir = "images/";
		$target_file = $target_dir ."pt"."-".basename($_FILES["pro_image"]["name"]);
		
		//uploading
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["pro_image"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			// echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			// echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["pro_image"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["pro_image"]["name"]). " has been uploaded.";
				$pic = $target_file;//the file path to be inserted into the table patients at field 'pic'
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
		//end uploading image =======================================================================

		$sql = "INSERT INTO product (proid, proname, protype, proprice, procost, prostock,  prosale, 
		stockDate, stockNum, pro_image) 
                         VALUES ('$proid', '$proname', '$protype', '$proprice', '$procost', '$prostock', '$prosale', '$stockDate', '$stockNum', '$pic')"; 						

		$rs = mysqli_query($conn,$sql); //รันคำสั่ง sql เก็บผลลัพธ์ใน $rs
		echo "<script>
						alert('บันทึกรายการ');
						window.location.href='product.php';
			 </script>";
		
			 
	  
	}

?>

<?php
   include "dbconnect.php";
   if(isset($_POST['inssup'])) {
	   $spid             	=$_POST['spid']; //product_sup
	   $spn	                =$_POST['spn'];
	   $snm	                =$_POST['snm'];	

	   $sql = "INSERT INTO supp (ssid, spn, snm)
	             VALUES ('$ssid', '$spn', '$snm')"; 						

	   $rs = mysqli_query($conn,$sql); //รันคำสั่ง sql เก็บผลลัพธ์ใน $rs
		echo "<script>
						window.location.href='insertPro.php';
   	 	     </script>";
   }
   
?>

<?php
    include "dbconnect.php";
    if(isset($_POST['delsup'])){ // (2) in case of deleting
		$spid             	=$_POST['spid']; //product_sup
		$spn	                =$_POST['spn'];
		$snm	                =$_POST['snm'];	
 
		$sql = "DELETE FROM supp
				 WHERE ptid = '$spid'";
	 
		if($conn->query($sql)==TRUE){
			   echo "<script>
						alert('# = ".$spid." is deleted successfully.'); 
						window.location.href='insertPro.php';
					</script>";
		} else {
			   //echo "Deleting Error".$conn->error;
			   echo "<script>
						alert('Deleting Error:".$conn->error."');
					 </script>";
	 }	
 }//end delete
 
 ?>