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
    cursor : pointer
}
        </style>
    </head>
<body>
    <table style="width: 100%;text-align: center;">
        <tr>
            <td class="logo" ><img src="download.jfif"></td>
            <td ><h2>COLLEGE OF ENGINEERING - GUINDY</h2></td>
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
                <th>Name</th>
                <th>Mess ID</th>
                <th>Phone no.</th>
                <th>Date of Birth</th>
                <th>Salary</th>
                <th>Build_no</th>
                <th>Edit</th>
            </tr>
    <?php
        $database = mysqli_connect('localhost','root','','hostel');
        if($database){
            $query = "SELECT * FROM mess_entry";
            $results = mysqli_query($database,$query);
            while($row = mysqli_fetch_array($results)){
        ?>
		<tr>
			<td><label><?php echo $row['memp_name']; ?></label></td>
			<td><label><?php echo $row['memp_id']; ?></label></td>
			<td><label><?php echo $row['ph_no']; ?></label></td>
			<td><label><?php echo $row['DOB']; ?></label></td>
			<td><label><?php echo $row['salary']; ?></label></td>
            <td><label><?php echo $row['Build_no']; ?></label></td>
            <td>
                <a class="update" href="update_mess.php?memp_id=<?php echo $row["memp_id"]; ?>">Update</a>
                <a class="delete" href="del_mess.php?id=<?php echo $row["memp_id"]; ?>">Delete</a>
            </td>
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