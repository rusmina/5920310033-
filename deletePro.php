<?php 
    include "dbconnect.php";

    $proid = $_GET['proid'];

    // $qdel = "SELECT pro_image FROM product WHERE proid='$proid'";
    // $result = mysqli_query($dbcon, $q);
    // $pro_image = myaqli_fetch_array($result, MYSQLI_NUM);
    // $filename = $pro_image[0];

    @unlink('images/'.$filename);

    $sql = "DELETE FROM product WHERE proid='$proid'";	
    $result = mysqli_query($conn, $sql);

    echo "<script>
			window.location.href='showPro.php';
		  </script>";
    
    mysqli_close($conn);

?>