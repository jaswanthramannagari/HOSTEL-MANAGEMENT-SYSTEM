<?php
    include 'config.php';
    if(count($_POST) > 0){
        mysqli_query($conn, "UPDATE `hostel_furniture` SET `furniture_type`='". $_POST['Furn_type']."',`furniture_id`='". $_POST['Furniture_id']."',`Room_id`='". $_POST['Room_id']."' WHERE `furniture_id`='".$_POST['Furniture_id']."'");
        echo "<script language='javascript'>";
            echo "alert('Record Modified successfully')";
            echo "</script>";
        $message = "Record Modified successfully";
    }
    $query = "SELECT * FROM hostel_furniture WHERE `furniture_id`='".$_GET['furn_id']."'";
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
            <table class="form_table">
                <tr>
                    <td><label for="Furn_type">Furniture Type</label></td>
                    <td><input type="text" id="Furn_type" value="<?php echo $row['furniture_type']; ?>" name = "Furn_type" /></td>
                </tr>
                <tr>
                    <td><label for="Furniture_id">Furniture id</label></td>
                    <td><input type="text" id="Furniture_id" value="<?php echo $row['furniture_id']; ?>" name = "Furniture_id" /></td>
                </tr>
                <tr>
                    <td><label for="Room_id">Room id</label></td>
                        <td><input type="text" id="Room_id" value="<?php echo $row['Room_id']; ?>" name = "Room_id" /></td>
                </tr>
            </table>
            <button class="mbutton">Submit</button>
        <br><br>  
        </form>
        <form action="furniture_display.php">
            <button class="mbutton"> Furnitur's display</button>
        </form>
    </center>
    </body>
</html>