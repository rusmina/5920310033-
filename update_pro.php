<?php
      include "dbconnect.php";
      if(isset($_POST['updatePro'])){ //in case of update
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
                $sql = "UPDATE product SET
                        proname='$proname', 
                        protype='$protype', 
                        proprice='$proprice', 
                        procost='$procost', 
                        prostock='$prostock',  
                        prosale='$prosale', 
                        stockDate='$stockDate',
                        stockNum='$stockNum',
                        pro_image='$pic'
                    WHERE proid='$proid'";

   
        } else {
                echo "Sorry, there was an error uploading your file.";
     }
   
        if ($conn->query($sql) === TRUE) {
        //"Record updated successfully" and redirect to the menu
        session_start();//start session
        $id = $_SESSION['valid_id'];	
        $utype = $_SESSION['valid_utype'];
        if($utype==1) //staff/admin
        echo "<script>
                    alert('Updated successful JA');
                    window.location.href='product.php';
            </script>";
        else if($utype==3) //if patient
        echo "<script>
                alert('Updated successful JA');
                window.location.href='showPro.php';
            </script>";
} else {
    echo "Error updating record: " . $conn->error;
}



	}

      }
        
?>