<?php
    include 'config.php';
    $sql = "DELETE FROM `room_ent` WHERE Room_id='".$_GET["Room_id"]."'";
    if(mysqli_query($conn,$sql)){
        echo "<center><h1>Deleted sucessfully...<h1></center>";
    }
    else{
        echo "<script language='javascript'>";
        echo "alert('error deleting".mysqli_error($conn)."')";
        echo "</script>";
    }
?>