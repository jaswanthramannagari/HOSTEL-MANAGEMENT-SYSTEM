<?php
    include 'config.php';
    if(count($_POST) > 0){
        mysqli_query($conn, "UPDATE `visitor` SET `v_name`='". $_POST['vis_name']."',`s_name`='". $_POST['stu_name']."',`sid`='". $_POST['stu_id']."',`v_date`='". $_POST['v_date']."',`time_in`='". $_POST['time_in']."',`time_out`='". $_POST['time_out']."' WHERE `Room_id`='".$_POST['Room_id']."'");
        echo "<script language='javascript'>";
            echo "alert('Record Modified successfully')";
            echo "</script>";
        $message = "Record Modified successfully";
    }
    $query = "SELECT * FROM visitor WHERE `v_name`='".$_GET['vis_name']."'";
    $result = mysqli_query($conn, $query);
    $row= mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            VISITOR
        </title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <table style="width: 100%; height: 10%;border: 2px solid black;text-align: center;">
            <tr>
                <td class="logo" ><img src="download.jfif"></td>
                <td class="heading"><h1>COLLEGE OF ENGINEERING - GUINDY</h1></td>
            </tr>
        </table><br><br>
        <button class="back" onclick="document.location.href='main.html'";>
            BACK
        </button><br><br>
        <center>
        <form action="index3.php" method="POST">
            <table >
                <tr>
                    <td><label for="vname">Visitor's Name :</label></td>
                    <td> <input type="text" id="vis_name" value="<?php echo $row['v_name']; ?>" name="vis_name" /></td>
                </tr>
                <tr>
                    <td><label for="stu_name">Student's Name :</label></td>
                    <td> <input type="text" id="stu_name" value="<?php echo $row['s_name']; ?>" name="stu_name" /></td>
                </tr>
                <tr>
                    <td><label for="stu_id">Student's ID :</label></td>
                    <td> <input type="text" id="stu_id" value="<?php echo $row['sid']; ?>" name="stu_id" /></td>
                </tr>
                <tr>
                    <td><label for="v_date">Visitor's date :</label></td>
                    <td> <input type="date" id="v_date" value="<?php echo $row['v_date']; ?>" name="v_date" /></td>
                </tr>
                <tr>
                    <td><label for="time_in"> Time in :</label></td>
                    <td> <input type="time" id="time_in" value="<?php echo $row['time_in']; ?>" name="time_in" /></td>
                </tr>
                <tr>
                    <td><label for="time_out">Time out :</label></td>
                    <td> <input type="time" id="time_out" value="<?php echo $row['time_out']; ?>" name="time_out" /></td>
                </tr>
            </table>
            <button class="mbutton">Update</button>
        </form>
        </center>
    </body>
</html>