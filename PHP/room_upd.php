<?php
	$rid = $_POST['Room_id'];
	$fid = $_POST['Furniture_id'];
	$cap = $_POST['Capacity'];
	$bno = $_POST['Build_no'];
    $query = "UPDATE `room_ent` SET `Furniture_id`='$fid',`Capacity`='$cap',`Build_no`='$bno' WHERE `Room_id`='$rid'";
    $conn =  mysqli_connect('localhost','root','','hostel');
	if(mysqli_query($conn,$query)){
        echo "Connected, and updated successfully";
    }
    else{
        echo "Error connecting";
    }


?>