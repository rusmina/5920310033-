
<?php
    
	// $servername = "localhost";
    //$servername = "127.0.0.1";
    $servername = "172.18.111.41";
    $username = "5920310033";
    $password = "5920310033";
    $dbname = "5920310033";
    // $servername = "172.18.111.43";
    // $username = "root";
    // $password = "mina070640";
    // $dbname = "projectdata";
    // Create connection object
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    //echo "Connected successfully";
    mysqli_set_charset($conn, "utf8");//is to make Thai readable
    date_default_timezone_set('Asia/Bangkok');
?>
