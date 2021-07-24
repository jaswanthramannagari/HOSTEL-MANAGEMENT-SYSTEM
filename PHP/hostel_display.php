<!DOCTYPE html>
<html>
    <head>
        <title>Student Display</title>
        <link rel="stylesheet" href="styles.css">
        <style>
            .update{
    background-color: green;
    padding: auto;
    border: none;
    color: white;
    text-align:center;
    width: 150px;
    height: 50px;;
    display: inline-block;
    margin: 4px 2px;
    cursor : pointer;
}
.delete{
    background-color: red;
    padding: auto;
    border: none;
    color: white;
    text-align:center;
    width: 150px;
    height: 50px;;
    display: inline-block;
    margin: 4px 2px;
    cursor : pointer;
}
        </style>
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
    <button class="back" onclick="document.location.href='mess.html'";>
        BACK
    </button>
    <br><br>
    <table class="table1">
            <tr>
                <th>Build no.</th>
                <th>No. of rooms</th>
                <th>No. of student</th>
                <th>Annual expense</th>
                <th>Edit</th>
            </tr>
    <?php
        $database = mysqli_connect('localhost','root','','hostel');
        if($database){
            $query = "SELECT * FROM hostel";
            $results = mysqli_query($database,$query);
            $i = 0;
            while($row = mysqli_fetch_array($results)){
            ?>
		<tr>
			<td><label><?php echo $row['Build_no']; ?></label></td>
			<td><label><?php echo $row['No_of_rooms']; ?></label></td>
			<td><label><?php echo $row['No_of_student']; ?></label></td>
			<td><label><?php echo $row['Annual_expense']; ?></label></td>
            <td>
                <a class="update" href="update_hostel.php?Build_no=<?php echo $row["Build_no"]; ?>">Update</a>
                <a class="delete" href="delete_hostel.php?Build_no=<?php echo $row["Build_no"]; ?>">Delete</a>
            </td>
        </tr>
		<?php
            $i++;
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