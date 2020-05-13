<?php 
    include "dbconnect.php";

    $cusid = $_GET['cusid'];

    // $qdel = "SELECT pro_image FROM product WHERE proid='$proid'";
    // $result = mysqli_query($dbcon, $q);
    // $pro_image = myaqli_fetch_array($result, MYSQLI_NUM);
    // $filename = $pro_image[0];

    $sql = "DELETE FROM customer WHERE cusid='$cusid'";	
    $result = mysqli_query($conn, $sql);

    echo "<script>
			window.location.href='showOrder.php';
		  </script>";
    
    mysqli_close($conn);

?>