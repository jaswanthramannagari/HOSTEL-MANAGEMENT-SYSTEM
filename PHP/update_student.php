<?php
    include 'config.php';
    if(count($_POST) > 0){
        $query = "UPDATE `student_entry` SET `s_name`='".$_POST['stu_name']."',`father_name`='".$_POST['father_name']."',`department`='".$_POST['Department']."',`ph_no`='".$_POST['Mob_no']."',`gender`='".$_POST['dropdown']."',`age`='".$_POST['Age']."',`DOB`='".$_POST['DOB']."',`email`='".$_POST['email']."',`Room_id`='".$_POST['room_id']."',`food_type`='".$_POST['veg_t']."',`Build_no`='".$_POST['Build_no']."',`room_type`='".$_POST['room_t']."' WHERE `sid`='".$_POST['stu_id']."'";
        mysqli_query($conn, $query);
        echo "<script language='javascript'>";
            echo "alert('Record Modified successfully')";
            echo "</script>";
        $message = "Record Modified successfully";
    }
    $query = "SELECT * FROM `student_entry` WHERE `sid`='".$_GET['sid']."'";
    $result = mysqli_query($conn, $query);
    $row= mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Student Entry</title>
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
        <button class="back" onclick="document.location.href='student_entry_display.php'";>
            BACK
        </button>
        <form action="" method="POST">
            <center>
                <table class="form_table">
                <tr>
                    <td><label for="stu_id">Student's ID</label></td>
                   
                    <td><input type="hidden" name="stu_id" value="<?php echo $row['sid']; ?>">
                        <input type="text" id="stu_id" value="<?php echo $row['sid']; ?>" name = "stu_id" /></td>
                </tr>
                    <tr>
                        <td><label for="stu_name">Student's Name</label></td>
                        <td>
                            <input type="text" id="stu_name" value="<?php echo $row['s_name']; ?>" name = "stu_name" /></td>
                    </tr>
                    
                    <tr>
                        <td><label for="father_name">Father's Name</label></td>
                        <td><input type="text" id="father_name" value="<?php echo $row['father_name']; ?>" name = "father_name" /></td>
                    </tr>
                    <tr>
                        <td><label for="Department">Department</label></td>
                        <td><input type="text" id="Department" value="<?php echo $row['department']; ?>" name = "Department" /></td>
                    </tr>
                    <tr>
                        <td><label for="Mob_no">Mobile number</label></td>
                        <td><input type="number" id="Mob_no" value="<?php echo $row['ph_no']; ?>" name = "Mob_no" /></td>
                    </tr>
                    <tr>
                        <td><label for="Gender">Gender</label></td>
                        <td>
                            <select name = "dropdown" value="<?php echo $row['gender']; ?>">
                                <option value = "Male" selected>Male</option>
                                <option value = "Female" selected>Female</option>
                                <option value = "Others" selected>Others</option>
                             </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="Age">Age</label></td>
                        <td><input type="number" id="Age" value="<?php echo $row['age']; ?>" name = "Age" /></td>
                    </tr>
                    <tr>
                        <td><label for="DOB">Date of Birth</label></td>
                        <td><input type="date" id="DOB" value="<?php echo $row['DOB']; ?>" name = "DOB" /></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email ID</label></td>
                        <td><input type="email" id="email" value="<?php echo $row['email']; ?>" name = "email" /></td>
                    </tr>
                    <tr>
                        <td><label for="room_id">Room ID</label></td>
                        <td><input type="text" id="room_id" value="<?php echo $row['Room_id']; ?>" name = "room_id" /></td>
                    </tr>
                    <tr>
                        <td><label>Food Status</label></td>
                        <td><select name = "veg_t" id="t_Veg">
                            <option value = "Non_Veg" selected>Non Veg</option>
                            <option value = "Veg" selected>Veg</option>
                         </select></td>
                    </tr>
                    <tr>
                        <td><label for="Build_no">Hostel Build no.</label></td>
                        <td><input type="text" id="Build_no" name = "Build_no" value="<?php echo $row['Build_no']; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Room type</td>
                        <td>
                            <select name = "room_t" id="room_t" value="<?php echo $row['room_type']; ?>">
                                <option value = "Single_Room" selected>Single Room</option>
                                <option value = "Double_Room" selected>Double Room</option>
                                <option value = "Triple_Room" selected>Triple Room</option>
                             </select>
                        </td>
                    </tr>
                    
                    </table>
                    <button class="mbutton" onclick="sum()">Submit</button>
                </center>
            </form>
        <script type="text/javascript">
            function sum(){
                var a, b;
                
                a = document.getElementById("t_Veg").value;
                b = document.getElementById("room_t").value;
    
                if( a == "Veg"){
                    a = 2000;
                } else if( a == "Non_Veg"){
                    a = 2500;
                }
                
                if( b == "Single_Room"){
                    b = 4500;
                } else if( b == "Double_Room"){
                    b = 3500;
                } else {
                    b = 2000;
                }
                
                var sum = (a+b);
                alert(a +" + "+ b +" = " + sum);
                
            }
        </script>
        </body>
    </html>