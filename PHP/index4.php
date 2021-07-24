<?php
	$bno = $_POST['Build_no'];
    $nor = $_POST['No_of_rooms'];
	$nos = $_POST['No_of_student'];
    $ae = $_POST['Annual_expense'];
	$query = "INSERT INTO hostel VALUES('$bno','$nor','$nos','$ae')";
	$conn =  mysqli_connect('localhost','root','','hostel');
	if(mysqli_query($conn,$query)){
        echo "Connected, and added successfully";
    }
    else{
        echo "Error connecting";
    }

?>