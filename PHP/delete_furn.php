<?php
    include 'config.php';
    $sql = "DELETE FROM `hostel_furniture` WHERE furniture_id ='".$_GET["furn_id"]."'";
    if(mysqli_query($conn,$sql)){
        echo "<center><h1>Deleted sucessfully...<h1></center>";
        
    }
    else{
        echo "<script language='javascript'>";
        echo "alert('error deleting".mysqli_error($conn)."')";
        echo "</script>";
    }
?>