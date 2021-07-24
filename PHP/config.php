<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "hostel";

    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    if(!$conn){
        echo "Couldnt connected".mysqli_connect_error($conn);
    }
    else{
        echo "<script language='javascript'>";
        echo "alert('connected to server successfull')";
        echo "</script>";
    }
?>