<?php
	$ftype = $_POST['Furn_type'];
	$fid = $_POST['Furniture_id'];
	$rid = $_POST['Room_id'];
	$query = "INSERT INTO hostel_furniture VALUES('$ftype','$fid','$rid')";
	$conn =  mysqli_connect('localhost','root','','hostel');
	if(mysqli_query($conn,$query)){
        echo "Connected, and added successfully";
    }
    else{
        echo "Error connecting";
    }


?>