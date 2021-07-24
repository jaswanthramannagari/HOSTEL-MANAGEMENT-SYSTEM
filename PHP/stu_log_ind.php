<!DOCTYPE html>
<html>
    <head>
        <title>Student login</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body >
        <table style="width: 100%; height: auto; text-align: center; color: black;">
            <tr>
                <td class="logo" ><img src="download.jfif"></td>
                <td ><h1 style="font-size: 30px;">COLLEGE OF ENGINEERING - GUINDY</h1><h4>Anna University, Chennai</h4></td>
                <td class="logo" ><img src="CEGlogo.jpg"></td>
            </tr>
        </table><br><br>
        <button class="back" onclick="document.location.href='student_log.html'";>
        BACK
        </button>
        <center>
<?php   
    include 'config.php';

    $sid = $_POST['stu_id'];
    $DOB    = $_POST['DOB'];

    
    $sql = "SELECT * FROM `student_entry` WHERE sid = '$sid' and DOB = '$DOB'";
    $result = $conn->query($sql);  
    if($result->num_rows > 0){  
        while($row = $result->fetch_assoc()){
        echo "<script language='javascript'>";
        echo "alert('Login successful')";
        echo "</script>";
        
        echo "<table class='table1' >";
            echo "<tr>";
                echo "<td>STUDENT's NAME </td>";
                echo "<td>".$row['s_name']."</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>STUDENT's ID </td>";
                echo "<td>".$row['sid']."</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>FATHER's NAME </td>";
                echo "<td>".$row['father_name']."</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>DEPARTMENT</td>";
                echo "<td>".$row['department']."</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>PHONE NUMBER</td>";
                echo "<td>".$row['ph_no']."</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>GENDER </td>";
                echo "<td>".$row['gender']."</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>AGE </td>";
                echo "<td>".$row['age']."</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>DATE OF BIRTH</td>";
                echo "<td>".$row['DOB']."</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>EMAIL ID </td>";
                echo "<td>".$row['email']."</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>ROOM ID </td>";
                echo "<td>".$row['Room_id']."</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>FOOD STATUS </td>";
                echo "<td>".$row['food_type']."</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>BUILD NUMBER </td>";
                echo "<td>".$row['Build_no']."</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>ROOM TYPE </td>";
                echo "<td>".$row['room_type']."</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>FEES </td>";
                echo "<td>".$row['fee']."</td>";
            echo "</tr>";
        }
    }
    else{
        echo "<h1>Failed to login</h1>";
    }
        
?> 
</center>
    </body>
</html>