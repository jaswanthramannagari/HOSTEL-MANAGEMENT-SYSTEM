<?php
	$Room_id = $_POST['Room_id'];
	$Furniture_id = $_POST['Furniture_id'];
	$Capacity = $_POST['Capacity'];
	$Build_no = $_POST['Build_no'];
	$query = "INSERT INTO room_ent VALUES('$Room_id','$Furniture_id','$Capacity','$Build_no')";
	$conn =  mysqli_connect('localhost','root','','hostel');
	if(mysqli_query($conn,$query)){
        echo "Connected, and added successfully";
    }
    else{
        echo "Error connecting".mysqli_error($conn);
    }


?>