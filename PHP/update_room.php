<?php
    include 'config.php';
    if(count($_POST) > 0){
        mysqli_query($conn, "UPDATE `room_ent` SET `Room_id`='". $_POST['Room_id']."',`Furniture_id`='". $_POST['Furniture_id']."',`Capacity`='". $_POST['Capacity']."',`Build_no`='". $_POST['Build_no']."' WHERE `Room_id`='".$_POST['Room_id']."'");
        echo "<script language='javascript'>";
            echo "alert('Record Modified successfully')";
            echo "</script>";
        $message = "Record Modified successfully";
    }
    $query = "SELECT * FROM room_ent WHERE `Room_id`='".$_GET['Room_id']."'";
    $result = mysqli_query($conn, $query);
    $row= mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Room edit</title>
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
        <button class="back" onclick="document.location.href='room_disp.php'";>
            BACK
        </button>
        <form action="room_upd.php" method="POST">
            <center>
                <table class="form_table">
                    <tr>
                        <td><label for="Room_id">Room id</label></td>
                        <td><input type="text" id="Room_id"  value="<?php echo $row['Room_id']; ?>" name = "Room_id" /></td>
                    </tr>
                    <tr>
                        <td><label for="Furniture_id">Furniture id</label></td>
                        <td><input type="text" id="Furniture_id"  value="<?php echo $row['Furniture_id']; ?>" name = "Furniture_id" /></td>
                    </tr>
                    <tr>
                        <td><label for="Capacity">Capacity</label></td>
                        <td><input type="number" id="Capacity" value="<?php echo $row['Capacity']; ?>" name = "Capacity" /></td>
                    </tr>
                    <tr>
                        <td><label for="Build_no">Hostel Build no.</label></td>
                        <td><input type="text" id="Build_no" value="<?php echo $row['Build_no']; ?>" name = "Build_no" /></td>
                    </tr>
                </table>
                <button class="mbutton">Update</button>
            </center>
        </form>
        <form action="room_disp.php">
            <button class="mbutton"> Room display</button>
        </form>
    </body>
</html>