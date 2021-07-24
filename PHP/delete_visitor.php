<?php
    include 'config.php';
    $sql = "DELETE FROM visitor WHERE v_name ='".$_GET["vis_name"]."'";
    if(mysqli_query($conn,$sql)){
        echo "<center><h1>Deleted sucessfully...<h1></center>";
    }
    else{
        echo "<script language='javascript'>";
        echo "alert('error deleting".mysqli_error($conn)."')";
        echo "</script>";
    }
?>