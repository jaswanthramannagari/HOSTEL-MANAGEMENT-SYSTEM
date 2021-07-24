<?php
    include 'config.php';
    if(count($_POST) > 0){
        mysqli_query($conn, "UPDATE `mess_entry` SET `memp_name`='". $_POST['mname']."',`memp_id`='". $_POST['mid']."',`ph_no`='". $_POST['mmob']."',`DOB`='". $_POST['DOB']."',`salary`='". $_POST['Salary']."',`Build_no`='". $_POST['Build_no']."' WHERE `memp_id`='".$_POST['mid']."'");
        echo "<script language='javascript'>";
            echo "alert('Record Modified successfully')";
            echo "</script>";
        $message = "Record Modified successfully";
    }
    $query = "SELECT * FROM mess_entry WHERE `memp_id`='".$_GET['memp_id']."'";
    $result = mysqli_query($conn, $query);
    $row= mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Mess Entry</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <table style="width: 100%; height: 5%;border: 2px solid black;text-align: center;">
            <tr>
                <td class="logo" ><img src="download.jfif"></td>
                <td class="heading"><h1>COLLEGE OF ENGINEERING - GUINDY</h1><h4>Anna University, Chennai</h4></td>
                <td class="logo" ><img src="CEGlogo.jpg"></td>
            </tr>
        </table><br><br>
        <button class="back" onclick="document.location.href='admin.html'";>
            BACK
        </button>

        <form action="" method="POST">
        <center>
            <label for="mname">Name :</label>
            <input type="text" id="mname" value="<?php echo $row['memp_name']; ?>" name="mname" /><br><br>
            <label for="mid">Employer's id :</label>
            <input type="text" id="mid" value="<?php echo $row['memp_id']; ?>" name="mid" /><br><br>
            <label for="mmob">Mobile no. :</label>
            <input type="number" id="mmob" value="<?php echo $row['ph_no']; ?>" name="mmob" ><br><br>
            <label for="dob">Date of birth :</label>
            <input type="date" id="dob" value="<?php echo $row['DOB']; ?>" name="DOB" ><br><br>
            <label for="Salary">Salary :</label>
            <input type="number" id="Salary" value="<?php echo $row['salary']; ?>" name="Salary" ><br><br>
            <label for="Build_no">Build_no :</label>
            <input type="text" id="Build_no" value="<?php echo $row['Build_no']; ?>" name="Build_no" /><br><br>
            <input type="submit" class="mbutton" value="Submit">
        </center>        
        </form>
    </body>
</html>
