<?php
	$name = $_POST['mname'];
	$id = $_POST['mid'];
	$ph_no = $_POST['mmob'];
	$dob = $_POST['dob'];
	$sal = $_POST['Salary'];
	$Build_no = $_POST['Build_no'];
	$query = "INSERT INTO mess_entry VALUES('$name','$id','$ph_no','$dob','$sal','$Build_no')";
	$conn =  mysqli_connect('localhost','root','','hostel');
	if(mysqli_query($conn,$query)){
        echo "Connected, and added successfully";
    }
    else{
        echo "Error connecting";
    }


?>