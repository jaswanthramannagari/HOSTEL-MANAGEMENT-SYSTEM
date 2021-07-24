<?php
    include 'config.php';
    if(count($_POST) > 0){
        mysqli_query($conn, "UPDATE `hostel` SET `Build_no`='".$_POST['Build_no']."',`No_of_rooms`='".$_POST['No_of_rooms']."',`No_of_student`='".$_POST['No_of_student']."',`Annual_expense`='".$_POST['Annual_expense']."' WHERE `Build_no`='".$_POST['Build_no']."'");
        echo "<script language='javascript'>";
            echo "alert('Record Modified successfully')";
            echo "</script>";
        $message = "Record Modified successfully";
    }
    $query = "SELECT * FROM hostel WHERE `Build_no`='".$_GET['Build_no']."'";
    $result = mysqli_query($conn, $query);
    $row= mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Hostel
        </title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <table style="width: 100%; height: 10%;border: 2px solid black;text-align: center;">
            <tr>
                <td class="logo" ><img src="download.jfif"></td>
                <td class="heading"><h1>COLLEGE OF ENGINEERING - GUINDY</h1><h4>Anna University, Chennai</h4></td>
                <td class="logo" ><img src="CEGlogo.jpg"></td>
            </tr>
        </table><br><br>
        <button class="back" onclick="document.location.href='admin.html'";>
            BACK
        </button><br><br>
        <center>
        <form action="" method="POST">
            <div>
                <?php if(isset($message)) { echo $message; } ?>
            </div>
            <table class="form_table">
                <tr>
                    <td><label for="Build_no">Hostel Build no.</label></td>
                    <td><input type="hidden" name="userid" class="txtField" value="<?php echo $row['Build_no']; ?>">
                    <input type="text"  id="Build_no" name = "Build_no" value="<?php echo $row['Build_no']; ?>"/></td>
                </tr>
                <tr>
                    <td><label for="No_of_rooms">No. of rooms</label></td>
                    <td><input type="number" id="No_of_rooms" name = "No_of_rooms" value="<?php echo $row['No_of_rooms']; ?>"/></td>
                </tr>
                <tr>
                    <td><label for="No_of_student">No. of student</label></td>
                    <td><input type="number" id="No_of_student" name = "No_of_student" value="<?php echo $row['No_of_student']; ?>" /></td>
                </tr>
                <tr>
                    <td><label for="Annual_expense">Annual expense</label></td>
                    <td><input type="number" id="Annual_expense" name = "Annual_expense" value="<?php echo $row['Annual_expense']; ?>"/></td>
                </tr>
                
            </table><br><br>
            <button class="mbutton">Submit</button>
        </form>
        <br><br>
        <form action="hostel_display.php">
            <button class="mbutton"> Hostel's display</button>
        </form>
        </center>
    </body>
</html>