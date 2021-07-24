<?php
	$name = $_POST['stu_name'];
	$id = $_POST['stu_id'];
	$fn = $_POST['father_name'];
	$dept = $_POST['Department'];
	$phno = $_POST['Mob_no'];
    $gender = $_POST['dropdown'];
	$age = $_POST['Age'];
	$dob = $_POST['DOB'];
	$email = $_POST['email'];
	$rid = $_POST['room_id'];
    $foods = $_POST['veg_t'];
    $bno = $_POST['Build_no'];
    $rtype = $_POST['room_t'];

    if($foods=='Veg'){
        $fp=2000; 
    }
    else{
        $fp=2500;
    }

    if($rtype== "Single_Room"){
        $rp=4500;
    }
    if($rtype== "Double_Room"){
        $rp=3500;
    }
    else{
        $rp=2000;
    }
    $fee= $fp + $rp;
	$query = "INSERT INTO student_entry VALUES('$name','$id','$fn','$dept','$phno','$gender','$age','$dob','$email','$rid','$foods','$bno','$rtype','$fee')";
	$conn =  mysqli_connect('localhost','root','','hostel');
	if(mysqli_query($conn,$query)){
        echo "<script language='javascript'>";
        echo "alert('Connected and inserted successfully')";
        echo "</script>";
        header('Location: student_log.html');
    }
    else{
        echo "Error connecting<br>".mysqli_error($conn);
    }


?>