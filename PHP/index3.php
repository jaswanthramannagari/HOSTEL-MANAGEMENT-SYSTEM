<?php
	$name = $_POST['vis_name'];
    $sname = $_POST['stu_name'];
	$sid = $_POST['stu_id'];
    $dat = $_POST['v_date'];
    $ti = $_POST['time_in'];
	$to = $_POST['time_out'];
	$query = "INSERT INTO visitor VALUES('$name','$sname','$sid','$dat','$ti','$to')";
	$conn =  mysqli_connect('localhost','root','','hostel');
	if(mysqli_query($conn,$query)){
        echo "Connected, and added successfully";
    }
    else{
        echo "Error connecting";
    }

?>