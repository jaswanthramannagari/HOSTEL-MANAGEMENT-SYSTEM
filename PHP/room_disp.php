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
    <button class="back" onclick="document.location.href='admin.html'";>
        BACK
    </button>
    <br><br>
    <center>
        <table class="table1">
            <tr>
                <th>Room_id</th>
                <th>Furniture_id</th>
                <th>Capacity</th>
                <th>Build_no</th>
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
                <td>
                    <a class="update" href="update_room.php?Room_id=<?php echo $row["Room_id"]; ?>">Update</a>
                    <a class="delete" href="delete_room.php?Room_id=<?php echo $row["Room_id"]; ?>">Delete</a>
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
