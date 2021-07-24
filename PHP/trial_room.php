<!DOCTYPE html>
<html>
    <head>
        <title>Student Display</title>
        <link rel="stylesheet" href="styles.css">
    </head>
<body>
    <table style="width: 100%;text-align: center;">
        <tr>
            <td class="logo" ><img src="download.jfif"></td>
            <td ><h2>COLLEGE OF ENGINEERING - GUINDY</h2><h4>Anna University, Chennai</h4></td>
                <td class="logo" ><img src="CEGlogo.jpg"></td>
        </tr>
    </table><br>
    <br><br>
    <button class="back" onclick="document.location.href='admin.html'";>
        BACK
    </button>
    <br><br>
    <center>
        <table class="table1">
            <tr>
                <th>Student's Id</th>
                <th>Student's Name</th>
                <th>Father's Name</th>
                <th>Department</th>
                <th>Edit</th>
            </tr>
    <?php
        $database = mysqli_connect('localhost','root','','hostel');
        if($database){
            $query = "SELECT * FROM room_ent";
            $results = mysqli_query($database,$query);
            while($row = mysqli_fetch_array($results)){
    ?>
            <tr>
                <td><label><?php echo $row['Room_id']; ?></label></td>
                <td><label><?php echo $row['Furniture_id']; ?></label></td>
                <td><label><?php echo $row['Capacity']; ?></label></td>
                <td><label><?php echo $row['Build_no']; ?></label></td>
            </tr>
    <?php
        }
    }
    else{
        echo "Not Connected";
    }
?>
</table>

</center>
</body>
</html>
